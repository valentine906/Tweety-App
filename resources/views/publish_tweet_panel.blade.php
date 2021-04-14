        <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
                <form action="{{route('home')}}" method="post">
                    @csrf
                    <!-- <input type="hidden" name="user_id" value="{{ auth()->user()->id}}"> -->
                    <textarea name="body" class="w-full" placeholder="Whats on your mind">
                    </textarea>

                    <hr class="my-4">

                    <footer class="flex justify-between">
                        <l1 class="mb-4">
                                <img src="{{asset('storage/' . current_user()->avater )}}"alt="{{ current_user()->name}}" title="{{ current_user()->name}}" class="rounded-full mr-2" width="50" height="50">
                             {{ current_user()->name}}
                        </l1>
                        <button type="submit" class="bg-blue-500 rounded-lg shadow py-4 px-2 text-white">Tweet a root</button>
                    </footer>

                    
                </form>
                <div>
                    @error('body')
                        <p class="text-red-500 text-sm ml-2">{{$message}}</p>
                    @enderror
                </div>
            </div>