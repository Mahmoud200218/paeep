<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payments\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PaymentMethodsController extends Controller
{
    public function index()
    {
        return PaymentMethod::paginate();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => ['nullable', 'in:active,inactive'],
            'description' => ['nullable'],
            'slug' => ['nullable'],
        ]);

        $method = PaymentMethod::findOrFail($id);

        $payment = $method->update($request->all());

        return Response::json($payment);
    }
}
