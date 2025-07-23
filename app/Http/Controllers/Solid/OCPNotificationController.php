<?php

namespace App\Http\Controllers\Solid;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\User;
use App\Services\Notification\Channels\SlackNotificationChannel;
use App\Services\Notification\NotificationService;
use Illuminate\Support\Facades\Mail;

class OCPNotificationController extends Controller
{
    /**
     * ✅ This method follows the Open/Closed Principle (OCP).
     *
     * The NotificationService depends on the NotificationChannelInterface,
     * allowing any notification channel (e.g., Slack, Email, SMS) to be used
     * without changing the service's internal logic.
     *
     * To add a new channel, you simply create a new class that implements the interface,
     * and pass it in — no need to modify this method or the service class.
     *
     * This design is modular, testable, and easily extensible — a perfect example of OCP in action.
    */
    public function send()
    {
        $user = User::first(); // Example user
        $channel = new SlackNotificationChannel(); // or EmailNotificationChannel
        $service = new NotificationService($channel);
        $service->notify($user, 'Your report is ready.');

        return response()->json(['message' => 'Notification sent.']);
    }

    /**
     * ❌ This method violates the Open/Closed Principle (OCP).
     *
     * It uses conditional logic to determine which notification channel to use.
     * Every time a new channel is introduced (e.g., WhatsApp, Telegram),
     * the method must be modified — increasing the risk of bugs and making it harder to maintain.
     *
     * ✅ OCP encourages code to be open for extension (add new channels),
     * but closed for modification (existing logic should not change).
     *
     * The proper solution is to use an interface (NotificationChannelInterface)
     * and inject the desired channel implementation (Email, Slack, etc.)
     * so new behaviors can be added without touching this method.
    */
    public function send2($channel, $user, $message)
    {
        if ($channel === 'email') {
            Mail::to($user->email)->send(new NotificationMail($message));
        } elseif ($channel === 'sms') {
            // Send via SMS gateway
        } elseif ($channel === 'slack') {
            // Send via Slack webhook
        }
    }
}
