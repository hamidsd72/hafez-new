<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
class AboutBranch extends Model
{

    protected $guarded = ['id'];

    public function activity()
    {
        return $this->morphOne('App\Activity', 'activities');
    }
    public function langs()
    {
        return $this->hasMany('App\Models\Lang','item_id')->where('type','about_branch');
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