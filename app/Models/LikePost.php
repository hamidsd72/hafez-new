<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikePost extends Model
{
    protected $fillable = [
        'id',
        'comment_id',
        'value',
        'created_at',
        'updated_at'
    ];
}
 