<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function activity()
    {
        return $this->morphOne('App\Activity', 'activities');
    }
    public function photos()
    {
        return $this->morphMany('App\Photo', 'pictures');
    }

    public function langs()
    {
        return $this->hasMany('App\Models\Lang','item_id')->where('type','about');
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