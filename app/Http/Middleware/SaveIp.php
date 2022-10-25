<?php

namespace App\Http\Middleware;

use Closure;

class SaveIp
{
    public function handle($request, Closure $next)
    {
        $msg    = 'این آی پی تایید نشده است از طریق دستگاه قبلی وارد شده و آی پی جدبد را فعال کنید';
        $ip     =  request()->ip();
        $divice = request()->header('User-Agent');

        $active_ip  = auth()->user()->ip()->where('status','active')->pluck('ip');
        $block_ip   = auth()->user()->ip()->where('status','block')->pluck('ip');

        if ($active_ip->count()==0 && $block_ip->count()==0) {
            \App\Models\SaveIp::create([
                'user_id'       => auth()->user()->id,
                'ip'            => $ip,
                'description'   => $divice,
                'status'        => 'active',
            ]);

            return $next($request);

        } elseif ( in_array( $ip , $this->toArray( $active_ip ) ) || auth()->user()->getRoleNames()->first()=='ادمین ارشد' ) {
            return $next($request);
        } elseif ( in_array( $ip , $this->toArray( $block_ip  ) ) ) {
            $msg = 'این آی پی مسدود شده است';
        } else {
            \App\Models\SaveIp::create([
                'user_id'       => auth()->user()->id,
                'ip'            => $ip,
                'description'   => $divice,
            ]);
        }
        auth()->logout();
        return redirect('login')->with(['err_message' => $msg]);
    }

    public function toArray($data) {
        $array = array();
        foreach ($data as $item) {
            array_push( $array , $item );
        }
        return $array;
    }
    
}