<?php
use Illuminate\Database\Eloquent\Builder;

namespace App\Models;


trait  Likable
{

	  public function scopeWithLikes(Builder $query)
    {
    	$query->leftJoinSub(
    		'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
    		'likes',
    		'likes.tweet_id',
    		'tweets.id'
    	);
    }

	 // LIKE A TWEET FUNCTION
     public function like($user = null, $liked = true)
    {
    	 $this->likes()->updateOrCreate([

    	 	'user_id' =>$user ? $user->id : auth()->id
    	 ],[
    	 	'liked' => $liked
    	 	]);
    }




    // DISLIKE A TWEET FUNCTION
      public function dislike($user = null)
    {
    	return $this->like($user,false);
    }




       public function isLikedBy(User $user)
    {
    	return (bool) $user->likes->where('tweet_id', $this->id)->where('liked',true)->count();
    }

    public function isDisLikedBy(User $user)
    {
    	return (bool) $user->likes->where('tweet_id', $this->id)
    	->where('liked',false)->count();
    }




    // EACH TWEETS MAY HAVE MANY LIKES
     public function likes()
    {
    	return $this->hasMany(Like::class); 
    }
}


