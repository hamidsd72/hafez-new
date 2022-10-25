<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinceCity extends Model
{

	public $timestamps = false;

    protected $parent = 'parent_id';

    protected $guarded = ['id'];

    protected $sort = 'sort';

    public function parent()
    {
        return $this->hasOne('App\ProvinceCity', 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\ProvinceCity', 'parent_id');
    }

    public function province_needs()
    {
        return $this->hasMany('App\Need', 'province__id');
    }

    public function city_needs()
    {
        return $this->hasMany('App\Need', 'city_id');
    }
}
