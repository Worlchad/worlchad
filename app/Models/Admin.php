<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    
    public function role(){
        return $this->hasOne(\App\Models\Role::class);
    }

    public function blogs(){
        return $this->morphMany(Blog::class, 'blogable');
    }
    public function videos(){
        return $this->morphMany(\App\Video::class, 'user');
    }
}
