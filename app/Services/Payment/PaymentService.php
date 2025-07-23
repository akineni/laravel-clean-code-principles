<?php

namespace App\Services\Payment;

use App\Services\Payment\Interfaces\PaymentGatewayInterface;

class PaymentService
{
    protected PaymentGatewayInterface $gateway;

    public function __construct(PaymentGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function processPayment(float $amount): string
    {
        return $this->gateway->pay($amount);
    }
}
