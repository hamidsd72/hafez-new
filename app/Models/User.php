<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    protected $guard_name = 'web';

    use Notifiable;
    use HasRoles;

    protected $fillable = ['number_copon','reagent_code','name', 'lname', 'birthday','score' ,  'email' , 'ncode' , 'mobile' , 'password' , 'acquaintance' , 'status' , 'sex' , 'state' , 'city' , 'address' , 'pcode' , 'reagent' , 'view'];
    protected $hidden = ['password', 'remember_token'];

    public function getMobileAttribute($value)
    {
        $first_ch=substr($value,0,1);
        if ($first_ch!='0'){
            return "0$value";
        }else{
            return $value;
        }
    }

//    public function setMobileAttribute($value)
//    {
//        $first_ch=substr($value,0,1);
//        if ($first_ch!='0'){
//            $this->attributes['first_name'] = "0$value";
//        }else{
//            $this->attributes['first_name'] = $value;
//        }
//    }
    public function ip()
    {
        return $this->hasMany('App\Models\SaveIp','user_id');
    }

    public function awarding() {
        return $this->belongsToMany('App\Award', 'awarded');
    }

    public function photo()
    {
        return $this->morphOne('App\Photo', 'pictures');
    }
    public function user()
    {
        return $this->morphOne('App\User');
    }
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function activity()
    {
        return $this->morphOne('App\Activity', 'activities');
    }
    public function getCity()
    {
        return $this->hasOne('App\ProvinceCity', 'id','city');
    }
    public function getState()
    {
        return $this->hasOne('App\ProvinceCity', 'id','state');
    }

    public function hbds()
    {
        return $this->hasMany('App\Hbd');
    }

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission','user_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($item) {
            $item->photo()->get()
                ->each(function ($photo) {
                    $path = $photo->path;
                    File::delete($path);
                    $photo->delete();
                });
        });
    }
}
