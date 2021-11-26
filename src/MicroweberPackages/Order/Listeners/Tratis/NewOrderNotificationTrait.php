<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 2/4/2021
 * Time: 3:42 PM
 */


namespace depexorPackages\Order\Listeners\Tratis;

use Illuminate\Support\Facades\Notification;
use depexorPackages\Order\Models\OrderAnonymousClient;
use depexorPackages\User\Models\User;
use depexorPackages\Order\Notifications\NewOrderNotification;

trait NewOrderNotificationTrait {

    public function sendNewOrderNotification($order) {

        $orderId = $order->id;

        $newOrderEvent = new NewOrderNotification($order);

        // Is logged
        $notifiable = false;
        if (isset($order->created_by) && $order->created_by > 0) {
            $customer = User::where('id', $order->created_by)->first();
            if ($customer) {
                if (empty($order->email)) {
                    $notifiable = $customer;
                }
            }
        }

        if (!$notifiable) {
            $notifiable = OrderAnonymousClient::find($orderId);

        }

        if ($notifiable) {
            $notifiable->notifyNow($newOrderEvent);
        }

    }
}
