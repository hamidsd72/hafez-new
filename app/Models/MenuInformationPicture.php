<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuInformationPicture extends Model
{
    protected $table = 'menu_information_pictures';
    
    protected $fillable = [
        'id',
        'menu_information_id',
        'pic',
    ];
}
 