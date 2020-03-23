<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Team extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }

    public function getImageAttribute()
    {
        return asset('uploads/events/teams/'.$this->logo);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }


}
