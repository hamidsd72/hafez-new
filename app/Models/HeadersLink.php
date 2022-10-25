<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadersLink extends Model
{
    protected $fillable = [
        'id',
        'menu_id',
        'status',
        'sort',
        'label',
        'link',
        'created_at',
        'updated_at'
    ];

    public function activity()
    {
        return $this->morphOne('App\Activity', 'activities');
    }

}
 