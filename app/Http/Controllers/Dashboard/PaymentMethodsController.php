<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Front\Contact;
use App\Models\Payments\PaymentMethod;
use App\PaymentGateways\PaymentGatewaysFactory;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the latest contacts and paginate them
        $contacts = Contact::latest()->paginate();

        // Retrieve payment methods and paginate them
        $methods = PaymentMethod::paginate();

        // Return the view with contacts and payment methods
        return view('dashboard.payments.index', [
            'contacts' => $contacts,
            'methods' => $methods,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the payment method by ID
        $method = PaymentMethod::findOrFail($id);

        // Create a payment gateway instance based on the method's slug
        $gateway = PaymentGatewaysFactory::create($method->slug);

        // Return the view for editing the payment method with method and gateway options
        return view('dashboard.payments.edit', [
            'method' => $method,
            'options' => $gateway->formOptions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the payment method by ID
        $method = PaymentMethod::findOrFail($id);

        // Update the payment method with the request data
        $method->update($request->all());

        // Redirect to the payment methods index with a success message
        return redirect()->route('dashboard.payments.index')
            ->with('success', 'Payment Method has been updated successfully');
    }

}
