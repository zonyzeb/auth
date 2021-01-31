<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $activities= json_decode(Redis::get('user_activity.'.Auth::user()->id ));

        $userActivity = [];

        if(($activities))
	        foreach ($activities as $id => $activity) {
	            
	            $userActivity[] = [
	                'action' => $activity->action,
	                'time' => $activity->time,
	                'msg' => str_replace('_', ' ', $activity->action),
	            ] ;
	        }

        $userActivity = array_reverse($userActivity);

        return response(['activities' => $userActivity], 201);
    }
}
