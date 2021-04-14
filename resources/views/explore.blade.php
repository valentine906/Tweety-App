<x-app>
	<div>
		@foreach($users as $user)
			<a href="{{ $user->path() }}">
			<div class="flex items-center mb-5">
				<img src="{{asset('storage/' . $user->avater )}}" alt="{{$user->name}}" width="60" class="mr-4 rounded">
			
				<div>
					<h4 class="font-bold"> {{'@'.$user->username }} </h4>
				</div>
			</div>
			</a>
		@endforeach
		
	</div>
</x-app>