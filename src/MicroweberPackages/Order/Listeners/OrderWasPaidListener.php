<?php

namespace depexorPackages\Order\Listeners;


use depexorPackages\Option\Facades\Option;
use depexorPackages\Order\Listeners\Tratis\NewOrderNotificationTrait;

class OrderWasPaidListener
{
    use NewOrderNotificationTrait;

    public function handle($event)
    {
        $order = $event->getModel();

        $sendWhen = Option::getValue('order_email_send_when', 'orders');

        if ($sendWhen == 'order_paid') {
            $this->sendNewOrderNotification($order);
        }
    }
}
