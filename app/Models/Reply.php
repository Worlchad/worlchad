<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    public function comment()
    {
        return $this->belongsTo(\App\Models\Comment::class);
    }

    public function getNameInitialsAttribute()
    {
        $name = explode(' ', $this->name);
        $in = '';
        foreach ($name as $n) {
            if (strlen($n) > 0)
                $in .= $n[0];
        }
        return $in;
    }

    public function repliable()
    {
        return $this->morphTo();
    }
}
