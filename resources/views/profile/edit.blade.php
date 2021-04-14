<x-app>
	<form method="post" action="/profile/{{$user->username}}" enctype="multipart/form-data">
		@csrf
		@method('patch')

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name" >
				Name
			</label>
			<input type="text" name="name" id="name" value="{{$user->name}}" class="border border-gray-400 m-full">
			@error('name')
				<p class="text-red-500 text-xs mt-2">
					{{$message}}
				</p>
			@enderror	
		</div>

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username" >
				username
			</label>
			<input type="text" name="username" value="{{$user->username}}" id="username" class="border border-gray-400 m-full">
			@error('username')
				<p class="text-red-500 text-xs mt-2">
					{{$message}}
				</p>
			@enderror	
		</div>

		<!-- UPLOAD IMAGE HERE -->
		<div class="mb-6 ">
			
				<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avater" >
					Upload image
				</label>
			<div class="flex">
				<input type="file" name="avater" value="{{$user->avater}}" id="avater" class="border border-gray-400 m-full">
				<img src="{{asset('storage/' . $user->avater )}}" title="{{$user->name}}" value="Your avater image"  width="40px">
				
				@error('avater')
					<p class="text-red-500 text-xs mt-2">
						{{$message}}
					</p>
				@enderror	
			</div>
			
		</div>

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email" >
				email
			</label>
			<input type="email" name="email" value="{{$user->email}}" id="email" class="border border-gray-400 m-full">
			@error('email')
				<p class="text-red-500 text-xs mt-2">
					{{$message}}
				</p>
			@enderror	
		</div>

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password" >
				password
			</label>
			<input type="password" name="password" id="password" class="border border-gray-400 m-full" required>
			@error('password')
				<p class="text-red-500 text-xs mt-2">
					{{$message}}
				</p>
			@enderror	
		</div>

		<div class="mb-6">
			<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation" >
				password_confirmation
			</label>
			<input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-400 m-full" required>
			@error('password_confirmation')
				<p class="text-red-500 text-xs mt-2">
					{{$message}}
				</p>
			@enderror	
		</div>

		<div class="mb-6">
			<button type="submit" class="bg-blue-400 text-white rounded  py-2 py-4 hover:bg-blue-500">
				Submit
			</button>
		</div>
	</form>
</x-app>

