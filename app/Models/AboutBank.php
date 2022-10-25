<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
class AboutBank extends Model
{

    protected $guarded = ['id'];

    public function activity()
    {
        return $this->morphOne('App\Activity', 'activities');
    }
    public function langs()
    {
        return $this->hasMany('App\Models\Lang','item_id')->where('type','about_bank');
    }
    public static function type_bours($type)
    {
        switch ($type)
        {
            case '1': return 'شماره حساب ';
            break;
            case '2': return 'بورس انرژی ';
            break;
            case '3': return 'بورس کالا ';
            break;
            default: return 'شماره حساب ';
        }
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            foreach ($category->langs as $lang){
                $lang->delete();
            }
        });
        static::deleting(function ($item) {
            if(is_file($item->pic))
            {
                File::delete($item->pic);
            }
        });
    }
}