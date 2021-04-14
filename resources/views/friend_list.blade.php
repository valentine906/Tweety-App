 <div class=" bg-gray-200 border border-gray-200 rounded-lg py-4 px-6">
 <h3 class="font-bold text-xl mb-4">Friends Following</h3>

 <ul>
 	@forelse(auth()->user()->followers as $user)
	 	<l1 class=" {{$loop->last ? '' : 'mb-4'}}">
	 		<div>
	 			<a href="/profile/{{$user->username}}" class="flex items-center text-sm">
	 				<img src="{{$user->avater}}"alt="" class="rounded-full mr-2" width="40" height="40">
	 				{{$user->name}}
	 			</a>
	 		</div>
	 	</l1>
	 @empty
	 	<li>No friends yet!</li>
 	@endforelse
 </ul>
</div>

                           
                        