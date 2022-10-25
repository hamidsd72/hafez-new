<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $fillable = [
        'id',
        'old_slug',
        'new_slug',
        'created_at',
        'updated_at'
    ];
}
 