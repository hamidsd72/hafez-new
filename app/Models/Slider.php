<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Slider extends Model
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
        return $this->hasMany('App\Models\Lang','item_id')->where('type','slider');
    }
    public static function type_file($item)
    {
        $file_extension = substr(strrchr($item ,'.'),1);
        switch ($file_extension ) {
            case "mp4":
                return "video";
                break;
            case "m4v":
                return "video";
                break;
            case "png":
                return "img";
                break;
            case "jpg":
                return "img";
                break;
            default:
                return "img";
        }
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
