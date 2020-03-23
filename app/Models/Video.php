<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Video extends Model
{
    //
    protected $fillable = [
        'title','description','key','tags','user_type','user_id','category_id','slug'
    ];

    public function category(){
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function user(){
        return $this->morphTo();        
    }
    
    public function comments(){
        return $this->morphMany(\App\Models\Comment::class,'commentable');
    }

    public function getLinkAttribute()
    {
        return 'https://res.cloudinary.com/samfield/video/upload/' . $this->key; 
    }

    public function getLinkPreviewAttribute()
    {
        return "https://res.cloudinary.com/demo/video/upload/e_preview:duration_8/". $this->key;
    }
}

