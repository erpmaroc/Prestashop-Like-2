<?php

namespace depexorPackages\Queue\Listeners;



class ProcessQueueListener
{
    public function handle($event)
    {
        $controller = app()->make('depexorPackages\Queue\Http\Controllers\ProcessQueueController');
        $controller->handle();
    }
}
