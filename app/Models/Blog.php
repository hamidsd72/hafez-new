<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Blog extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function photo()
    {
        return $this->morphOne('App\Photo', 'pictures');
    }

    public function activity()
    {
        return $this->morphOne('App\Activity', 'activities');
    }
    public function langs()
    {
        return $this->hasMany('App\Models\Lang','item_id')->where('type','blog');
    }
    public function views()
    {
        return $this->hasMany('App\Models\PostsView','post_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment','item_id')->where('type','blog')->where('reply_id',0)->where('lang',app()->getLocale())->where('status','active');
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
            foreach ($item->langs as $lang){
                $lang->delete();
            }
        });

    }

}
