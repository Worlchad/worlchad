<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function state(){
        return $this->belongsTo(\App\Models\State::class);
    }

    public function events(){
        return $this->hasMany(\App\Models\Event::class);
    }

    public function users(){
        return $this->hasMany(\App\User::class);
    }
    
    public function attendees(){
        return $this->hasMany(\App\Models\Attendee::class);
    }

    public function participants(){
        return $this->hasMany(\App\Models\Participant::class);
    }
}
