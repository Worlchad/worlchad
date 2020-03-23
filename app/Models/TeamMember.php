<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $dates = [
        'dob'
    ];
    protected $guarded = [];

    public function Team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name .' '.$this->middle_name .' '. $this->last_name;
    }

    public function getImageAttribute()
    {
        return asset('uploads/events/teams/'.$this->photo);
    }
}
