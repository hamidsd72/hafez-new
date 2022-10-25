<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'id','user_id','access','role_name','created_at','updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
