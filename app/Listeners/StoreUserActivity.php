<?php

namespace App\Listeners;

use App\Events\StoreUserActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class StoreUserActivity 
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
     * @param  StoreUserActivity  $event
     * @return void
     */
    public function handle(StoreUserActivity $event)
    {
        $currentTimestamp = Carbon::now()->toDateTimeString();

        $userinfo = $event->user;

        $action = $event->action;

        $key = 'user_activity.'.$userinfo->id;

        $value = [$action => $currentTimestamp];

        $currentValue = json_decode(Redis::get($key), true);

        $currentValue[] = $value;

        return Redis::set($key, json_encode($currentValue));
        
    }
}
