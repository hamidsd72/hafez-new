<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutFeature extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function activity()
    {
        return $this->morphOne('App\Activity', 'activities');
    }
    public function langs()
    {
        return $this->hasMany('App\Models\Lang','item_id')->where('type','about_f');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            foreach ($category->langs as $lang){
                $lang->delete();
            }
        });
    }
}