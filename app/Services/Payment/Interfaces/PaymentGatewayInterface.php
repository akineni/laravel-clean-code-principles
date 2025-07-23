<?php

namespace App\Services\Payment\Interfaces;

interface PaymentGatewayInterface
{
    public function pay(float $amount): string;
}
