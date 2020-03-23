<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['start_date','end_date'];
    //
    protected $gaurd = [];
    public function schedules(){

        return $this->hasMany(\App\Models\EventSchedule::class);
    }

    public function country(){
        return $this->belongsTo(\App\Models\Country::class);
    }

    public function state(){
        return $this->belongsTo(\App\Models\State::class);
    }

    public function city(){
        return $this->belongsTo(\App\Models\City::class);
    }
    public function category(){
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function attendees(){
        return $this->hasMany(\App\Models\Attendee::class);
    }

    public function participants(){
        return $this->hasMany(\App\Models\Participant::class);
    }
    

    public function getBannerImageAttribute(){
        return asset('uploads/events/banners/'.$this->banner);
    }

    public function transactions(){
        return $this->morphMany(Transaction::class,'transactable');
    }
}
