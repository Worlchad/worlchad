<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function states(){
        return $this->hasMany(\App\Models\State::class);
    }

    public function events(){
        return $this->hasMany(\App\Models\Event::class);
    }

    public function users(){
        return $this->hasMany(\App\User::class);
    }

    public function participant(){
        return $this->hasMany(\App\Models\Participant::class);
    }
    public function attendees(){
        return $this->hasMany(\App\Models\Attendee::class);
    }
}
