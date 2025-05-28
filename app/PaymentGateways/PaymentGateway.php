<?php

namespace App\PaymentGateways;

use App\Models\Payments\Payment;

interface PaymentGateway 
{
    public function create($donate);
    public function verify($id); // Check Transaction ID
    public function formOptions() : array;
}