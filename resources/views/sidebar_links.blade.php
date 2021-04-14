<ul>
	<li>
		<a class="font-bold text-lg mb-4 block" href="{{route('home')}}">
			Home
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href="/explore">
			Explore
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href="/notifications">
			Notifications
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href="/notifications">
			Messages
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href="/notifications">
			Bookmarks
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href="/notifications">
			Lists
		</a>
	</li>
	<li>
		<a class="font-bold text-lg mb-4 block" href="{{route('profile',current_user()->username)}}">
			Profile
		</a>
	</li>
	<li>
		<form method="post" action="/logout">
			@csrf
			<button class="font-bold text-lg">Logout</button>
		</form>
	</li>

</ul>