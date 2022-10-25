<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostsView extends Model {
    protected $fillable = [
        'id',
        'post_id',
        'created_at',
        'updated_at'
    ];
}
