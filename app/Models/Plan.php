<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name','price','duration'];
    
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    public function getFormatedPrice(){
        return $this->attributes['formated_price'] = '#'.number_format($this->price,2);
    }
}
