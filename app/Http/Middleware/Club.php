<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use App\User;
use App\Sms;
use App\Hbd;
use App\Activity;
use Illuminate\Support\Facades\Auth;

class Club
{
    public function handle($request, Closure $next)
    {

        // happy birthday
        $this->hbd();

        if (!is_null(Auth::user())) {

            if (Auth::user()->status == 4) {

                return redirect('club/wait');

            } elseif (Auth::user()->status == 5){

                return redirect()->back();

            }else {

                return $next($request);

            }
        } else {
            return redirect('login');
        }
    }

    public function hbd()
    {
        $fullToday= my_jdate(Carbon::today(),'Y/m/j');
        $todayHbd= Hbd::where('date',$fullToday)->first();
        if (!$todayHbd){
            $today= my_jdate(Carbon::today(),'/m/j');
            $users=User::where('birthday','LIKE',"%$today%")->get();
            if (count($users)){
                foreach ($users as $key=>$user){
                    $name=$user->name;
                    $mobile=$user->mobile;
                    // check whether name is EN or Not
                    if (!preg_match('/[^A-Za-z0-9]/', $name)) // '/[^a-z\d]/i' should also work.
                    {
                        $title="عزیز $name";
                    }else{
                        $title="$name عزیز";
                    }
                    $message="$title
در سالروز تولدتان بهترین ها را برای شما آرزومندیم.
داروسازی کارن";
                    Sms::sendMessage($message,$mobile);
                    $newHbd=new Hbd();
                    $newHbd->date=$fullToday;
                    $newHbd->message=$message;
                    $user->hbds()->save($newHbd);
                }
            }
        }
    }
}