<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newslatter extends Model
{
    protected $fillable = [
        'id','email','status',
    ];
    protected $table = 'newslaters';
}
