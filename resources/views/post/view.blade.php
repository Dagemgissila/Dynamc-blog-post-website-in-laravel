<x-app-layout>

    <article class="flex flex-col shadow my-4 w-100" style="width:60%">
        <!-- Article Image -->
        <a href="{{ route('view',$post)}}" class="hover:opacity-75">
            <img src="{">
        </a>
        <div class="bg-white flex flex-col justify-start p-6" style="width:100%">

            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4"></a>


            <a href="{{ route('view',$post)}}" class="text-3xl font-bold hover:text-gray-700 pb-4">

            </a>
            <p href="#" class="text-sm pb-3">
                By <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>
                , Published on {{$post->getFormattedDate()}}
            </p>
            <a href="{{ route('view',$post)}}" class="pb-6">
               {!! $post->body !!}
            </a>
            <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
        </div>

    @if($pre)
    <a href="{{ route('view',$pre)}}">preivious

        <p>{{$pre->title}}</p>
    </a>
    @endif


@if($next)
<a href="{{ route('view',$next)}}">next

    <p>{{$next->title}}</p>
</a>
@endif
    </article>



<x-sidebar/>
</x-app-layout>
