<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\servicemenu;
class service extends Model
{
    function service_category(){
        return $this->belongsTo(servicemenu::class ,'servicemenu_id');
    }
}
