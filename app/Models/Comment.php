<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    public function replies(){
        return $this->hasMany(\App\Models\Reply::class);
    }

    public function commentable(){
        return $this->morphTo();
    }

    public function getNameInitialsAttribute()
    {
        $name = explode(' ',$this->name);
        $in = '';
        foreach($name as $n){
            if(strlen($n) > 0)
                $in .=$n[0];
        }
        return $in;

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
