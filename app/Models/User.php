<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'avater',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest(); 
    }

    public function timeline()
    {
        // return Tweet::where('user_id',$this->id)->latest()->get();
        // GET ME ID OF THE USER FOLLOWERS
        $user_followers_id = $this->followers()->pluck('id');

       return Tweet::whereIn('user_id',$user_followers_id)->orWhere('user_id',$this->id)->latest()->paginate(2);
    }

    

    // FETCHES NAME INSTEAD OF ID
    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

    public function path($append = '')
    {
        $path =  route('profile',$this->username);
        return $append ? "($path)/($append)" : $path;   
    }

    //HASH CURRENT USER UPDATE PASSWORD TO HASH
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

     public function likes()
    {
        return $this->hasMany(Like::class); 
    }

}
