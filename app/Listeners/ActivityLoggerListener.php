<?php

namespace App\Listeners;

use App\Events\ActivityLoggerEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class ActivityLoggerListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ActivityLoggerEvent  $event
     * @return void
     */
    public function handle(ActivityLoggerEvent $event)
    {
        $currentTimestamp = Carbon::now()->toDateTimeString();

        $userinfo = $event->user;

        $action = $event->action;

        $key = 'user_activity.'.$userinfo->id;

        $value = ['action' => $action ,'time' => $currentTimestamp];

        if(strpos($action, 'registration') !== false)
            Redis::del($key);

        $currentValue = json_decode(Redis::get($key), true);

        $currentValue[] = $value;

        return Redis::set($key, json_encode($currentValue));
    }
}
