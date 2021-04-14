<div class=" p-4 {{$loop->last ? '' : 'border-b border-b-gray-200'}}  ">

     <div class="mr-2 flex-shrink-0">
        <img src="{{asset('storage/' . $tweet->user->avater )}}"alt="" class="rounded-full mr-2" width="30">
    </div>

<div>
    <a href="/profile/{{$tweet->user->name}}">
        <h5 class="font-bold mb-4"> {{$tweet->user->name}}</h5>
    </a>
    <p class="text-sm">
        {{$tweet->body}}
    
    </p>
    <p>Like <span> </span></p>
    <p>Dislikes <span>  </span></p>
 </div>
<p class="text-sm text-right">
      
        {{ $tweet->created_at->diffForHumans()}}
    </p>


</div>
