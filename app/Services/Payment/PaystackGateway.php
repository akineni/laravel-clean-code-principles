<?php

namespace App\Services\Payment;

use App\Services\Payment\Interfaces\PaymentGatewayInterface;

class PaystackGateway implements PaymentGatewayInterface
{
    public function pay(float $amount): string
    {
        return "Paid ₦{$amount} with Paystack";
    }
}
