<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Services\Payment\PaystackGateway;
use App\Services\Payment\PaymentService;

class OCPPurchaseController extends Controller
{
    /**
     * ✅ This method follows the Open/Closed Principle (OCP).
     *
     * The controller depends on the PaymentGatewayInterface through the PaymentService,
     * and uses a concrete gateway (e.g., PaystackGateway) that implements that interface.
     *
     * This design is open for extension — new payment gateways can be added
     * without modifying this method — and closed for modification of existing logic.
     *
     * The gateway can easily be swapped or injected dynamically, promoting flexibility and scalability.
    */
    public function purchase()
    {
        $gateway = new PaystackGateway(); // Could be StripeGateway
        $paymentService = new PaymentService($gateway);
        $message = $paymentService->processPayment(5000);

        return response()->json(['message' => $message]);
    }

    /**
     * ❌ This method violates the Open/Closed Principle (OCP).
     *
     * Each time a new payment gateway is added (e.g., Flutterwave, Razorpay),
     * this method must be modified — making the code harder to maintain and prone to errors.
     *
     * ✅ Instead, use polymorphism and rely on a common PaymentGatewayInterface.
     * New gateways can be added by creating new classes that implement the interface,
     * without touching this method.
     *
     * OCP = "Open for extension, closed for modification."
    */
    public function pay($gateway, $amount)
    {
        if ($gateway === 'stripe') {
            // Pay with Stripe
        } elseif ($gateway === 'paystack') {
            // Pay with Paystack
        } elseif ($gateway === 'paypal') {
            // Pay with PayPal
        }
    }
}
