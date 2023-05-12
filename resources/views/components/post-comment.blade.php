@props(['comment'])

<article class=" bg-gray-200 border border-gray-500 rounded-xl p-6 space-x-4"  >
    <div class="flex-shirnk-0">
        <img src="https://i.pravatar.cc/70?u='{{$comment->id}}'" width="70" height="70" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 c lass="font-bold">{{$comment->author->username}}</h3>
            <p class="text-xs">Posted <time>{{$comment->created_at->format('F j, Y, g:i a')}}</time></p>
        </header>
    </div>
    
        <p>{!!$comment->body!!}</p>
    
</article>
