<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $guarded = [];

    public function event(){
        return $this->belongsTo(\App\Models\Event::class);
    }

    public function country(){
        return $this->belongsTo(\App\Models\Country::class);
    }

    public function state(){
        return $this->belongsTo(\App\Models\State::class);
    }
}
