<?php

namespace App\Models;


trait  Followable 
{
   
    // FOLLOW USER
      public function follow(User $user)
    {
        return $this->followers()->save($user); 
    }
    // UNFOLLOW USER
     public function unfollow(User $user)
    {
        return $this->followers()->detach($user); 
    }

    // TOGGLE FOLLOW AND UNFOLLOW
     public function toggleFollow(User $user)
    {
        if($this->isFollowing($user)){
         return   $this->unfollow($user);
        }else{
           return  $this->follow($user);
        }
        //OR
        //$this->followers()->toggle($user);
    }

    // ALL USERS FOLLOWERS
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows','user_id','following_user_id'); 
    }
    // A USER IS FOLLOWING OTHER USER 
    public function isFollowing(User $user)
    {
        return $this->followers()->where('following_user_id', $user->id)->exists();
    }
    
}
