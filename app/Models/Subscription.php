<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id','plan_id','expired_at'];
    protected $dates = ['created_at', 'updated_at', 'expired_at'];
    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transactions(){
        return $this->morphMany(Transaction::class,'transactable');
    }
}
