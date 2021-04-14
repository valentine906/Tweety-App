<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    use Likable;
    
    protected $guarded = [];




    // Tweets belongs to a specific User
    public function user()
    {
    	return $this->belongsTo(User::class); 
    }



   
}
