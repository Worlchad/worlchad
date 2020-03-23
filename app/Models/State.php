<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    public function country(){
        return $this->belongsTo(\App\Models\Country::class);
    }

    public function cities(){
        return $this->hasMany(\App\Models\Country::class);
    }

    public function attendees(){
        return $this->hasMany(\App\Models\Attendee::class);
    }

    public function participants(){
        return $this->hasMany(\App\Models\Participant::class);
    }
    public function events(){
        return $this->hasMany(\App\Models\Event::class);
    }

    public function users(){
        return $this->hasMany(\App\User::class);
    }

    
}
