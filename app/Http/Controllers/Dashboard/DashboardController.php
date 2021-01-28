<?php

namespace App\Http\Controllers\Dashboard;

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
        foreach ($activities as $id => $activity) {
            // dd($activity);
            $userActivity[] = [
                'id' => $id+1,
                'action' => $activity->action,
                'time' => $activity->time,
            ] ;
        }

        return view('dashboard' , [
            'activitiesJson'=> json_encode($userActivity),
            'activities'=> $userActivity, 
        ]);
    }
}
