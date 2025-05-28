<?php

namespace App\PaymentGateways;

use Exception;
use Illuminate\Support\Str;

class PaymentGatewaysFactory 
{

    /**
     * Create a new Payment Gateway instance
     * @param string $gateway
     * @param \App\PaymentGateways\PaymentGateway
     */
    public static function create($name) : PaymentGateway
    {
        $class = 'App\PaymentGateways\\' . Str::studly($name);

        try{
            return new $class();
        }catch(\Exception $e){
            throw new Exception("Payment Gateway [{$name}] not found");
        }
    }
}