<?php

namespace App\Listeners;

use App\Events\RegistrationHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class StoreUserRegistrationHistory
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(RegistrationHistory $event)
    {

        $currentTimestamp = Carbon::now()->toDateTimeString();

        $userinfo = $event->user;

        $saveHistory = Redis::set('user.registration.'.$userinfo->id, $currentTimestamp);
        
        return $saveHistory;
    }
}
