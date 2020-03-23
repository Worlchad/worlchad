<?php

namespace App;

use App\Models\Blog;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\Team;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password','status','username','first_name',
    //     'last_name','phone','dob','gender',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function videos()
    {
        return $this->morphMany(\App\Models\Video::class, 'user');
    }

    public function blogs()
    {
        return $this->morphMany(Blog::class,'blogable');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function Teams()
    {
        return $this->hasMany(Team::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getAvatarAttribute()
    {
        if ($this->image !=='user.jpg')
            return asset('uploads/users/' . $this->image);

        if ($this->gender == 'male')
            return asset('assets/img/account-male.jpg');

        return asset('assets/img/account-female.jpg');


        // return $this->image !=null? asset('uploads/users/'.$this->image):$this->gender=='female'?asset('assets/img/account-male.jpg'):asset('assets/img/account-female.jpg');
    }
}
