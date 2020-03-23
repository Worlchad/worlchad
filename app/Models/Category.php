<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function events(){
        return $this->hasMany(\App\Models\Event::class);
    }
    public function videos(){
        return $this->hasMany(\App\Models\Video::class);
    }
}
