<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

     protected $guarded = [];
    
    // SHOW ME THE USER WHO LIKES TWEET
     public function user()
    {
    	return $this->belongsTo(User::class); 
    }

     // SHOW ME THE TWEET THIS VERY USER LIKES
     public function tweet()
    {
        return $this->belongsTo(Tweet::class); 
    }
}
