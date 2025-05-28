<?php

namespace App\PaymentGateways;

use App\Models\Front\Donate;
use App\Models\Payments\Payment;
use App\Models\Payments\PaymentMethod;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;

class StripePayment implements PaymentGateway
{
    protected $paymentMethod;

    public function __construct()
    {
        $this->paymentMethod = PaymentMethod::where('slug', 'stripepayment')->first();
        Stripe::setApiKey($this->paymentMethod->options['secret_key']);
        Stripe::setApiKey($this->paymentMethod->options['publishable_key']);
    }

    public function create($donate)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $lineItems = [];

        $totalPrice = 0;

        $donate = Donate::latest()->first();

        // Default values in case 'name' or 'price' are missing
        $donaterName = $donate->donater_name ?? Auth::user()->name;
        $donatePrice = $donate->price ?? $donate->other_price ?? 200; // Default price in cents (e.g., $1.00)

        // Check if 'name' and 'price' properties exist
        if (isset($donate->donater_name)) {
            $donaterName = $donate->donater_name;
        }
        if (isset($donate->price)) {
            $donatePrice = $donate->price * 100 ?? $donate->other_price * 100; // Convert to cents
        }

        // Add the product to line items
        $lineItems[] = [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $donaterName, // Use the product's name (default if not provided)
                    'images' => ['https://paeep.ps/Content/site/imges/Group%208541.png'],
                ],
                'unit_amount' => $donatePrice, // Stripe uses cents
            ],
            'quantity' => 1,
        ];

        // Calculate the total price
        $totalPrice += $donatePrice / 100; // Convert back to dollars

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems, // Pass the line items array
            'mode' => 'payment',
            'success_url' => route('payment.return', 'stripepayment') . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('payment.cancel', 'stripepayment'),
        ]);

        return redirect($session->url);
    }


    public function verify($id)
    {
        try {
            return redirect()->route('success');
        } catch (ApiErrorException $e) {
            return redirect()->route('failed');
        }
    }


    public function formOptions(): array
    {
        return [
            'secret_key' => [
                'type' => 'text',
                'label' => 'Secret Key',
                'placeholder' => 'Secret Key',
                'required' => true,
                'validation' => 'required|string|max:255',
            ],

            'publishable_key' => [
                'type' => 'text',
                'label' => 'Publishable Key',
                'placeholder' => 'Publishable Key',
                'required' => true,
                'validation' => 'required|string|max:255',
            ]
        ];
    }
}
