<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaveIp extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'ip',
        'status',
        'description',
        'created_at',
        'updated_at'
    ];
}
 