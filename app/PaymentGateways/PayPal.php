<?php

namespace App\PaymentGateways;

use App\Models\Payments\Payment;
use App\Models\Payments\PaymentMethod;
use Illuminate\Support\Facades\Redirect;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PayPal implements PaymentGateway
{
    protected $paymentMethod;
    protected $client;

    public function __construct()
    {
        $this->paymentMethod = PaymentMethod::where('slug', 'paypal')->first();
    }

    protected function client()
    {
        if (!$this->client) {
            $this->client = new PayPalHttpClient(
                new SandboxEnvironment(
                    $this->paymentMethod->options['client_id'],
                    $this->paymentMethod->options['client_secret']
                )
            );
        }

        return $this->client;
    }

    public function create($donate)
    {
        // Construct a request object and set desired parameters
        // Here, OrdersCreateRequest() creates a POST request to /v2/checkout/orders
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "test_ref_id1",
                "amount" => [
                    "value" => $donate->price, // Removed double curly braces
                    "currency_code" => "USD"
                ]
            ]],

            // redirect && callback URLs
            "application_context" => [
                "cancel_url" => route('payment.cancel', 'paypal'),
                "return_url" => route('payment.return', 'paypal')
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $this->client()->execute($request);

            $payment = Payment::forceCreate([
                'payment_method_id' => $this->paymentMethod->id,
                'paymentable_id' => $donate->id,
                'paymentable_type' => get_class($donate),
                'payer_id' => $donate->id,
                'payer_type' => get_class($donate),
                'price' => $donate->price,
                'currency_code' => $donate->currency_code,
                'type' => 'payment',
                'status' => 'pending',
                'transaction_id' => $response->result->id
            ]);

            foreach ($response->result->links as $link) {
                if ($link->rel == 'approve') {
                    return Redirect::away($link->href);
                }
            }
        } catch (\Exception $e) {
            echo $e;
            print_r($e->getMessage());
        }
    }

    public function verify($id): Payment
    {
        $request = new OrdersCaptureRequest($id);
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $this->client()->execute($request);

            if ($response->result->status == 'COMPLETED') {
                $payment = Payment::where('transaction_id', $id)
                    ->where('payment_method_id', $this->paymentMethod->id)
                    ->first();
                $payment->status = 'Completed';
                $payment->save();
            }

            return $payment;
        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }

    public function formOptions(): array
    {
        return [
            'client_id' => [
                'type' => 'text',
                'label' => 'Client ID',
                'placeholder' => 'Client ID',
                'required' => true,
                'validation' => 'required|string|max:255',
            ],
            'client_secret' => [
                'type' => 'text',
                'label' => 'Client Secret',
                'placeholder' => 'Client Secret',
                'required' => true,
                'validation' => 'required|string|max:255',
            ]
        ];
    }
}
