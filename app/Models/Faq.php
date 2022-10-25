<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Faq extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function cat()
    {
        return $this->belongsTo('App\Models\FaqCat','cat_id');
    }

    public function activity()
    {
        return $this->morphOne('App\Activity', 'activities');
    }
    public function langs()
    {
        return $this->hasMany('App\Models\Lang','item_id')->where('type','faq');
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