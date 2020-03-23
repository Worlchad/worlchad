<?php

namespace App\Models;

use Toolkito\Larasap\SendTo;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $guard = [];

    protected $fillable  = [
        'admin_id','title','summary','content','image','view','slug','admin_id','tags'
    ];


    public static function boot()
    {
        parent::boot();
        // static::created(function($blog){
        //     SendTo::Facebook(
        //         'link',
        //         [
        //             'link' => route('blog.post',$blog->slug),
        //             'message' => 'Laravel social auto posting'
        //         ]
        //     );
        // });
    }

    public function blogable(){
        return $this->morphTo();
    }

    public function comments(){
        return $this->morphMany(\App\Models\Comment::class,'commentable');
    }
}
