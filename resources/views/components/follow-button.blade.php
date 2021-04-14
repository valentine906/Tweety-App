@unless(current_user()->is($user))

	<form method="post" action="/profile/{{$user->username}}/follow">
	    @csrf
	   	<button type="submit" href="" class="bg-blue-500 rounded-lg shadow py-4 px-4 text-white text-xs">
	     {{current_user()->isFollowing($user) ? 'Unfollow me' : 'Follow me'}}
		</button>
	</form>
@endunless