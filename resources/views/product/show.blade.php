<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$product->name}}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 p-1 rounded-lg border border-gray-400 shadow dark:bg-gray-800 dark:border-gray-700">
        <div>
            <img src="{{ asset('/storage/'.$product->image)}}" alt="step3">
        </div>
        <div>
            <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $product->name }}
            </h5>
            <div class="text-xs font-bold uppercase text-blue-600 mt-1 mb-2">{{$product->created_at->format('d M Y')}}</div>
            <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">{{$product->category->name}}</div>
            <p class="mb-3 font-semibold text-base text-gray-700 dark:text-gray-400">
                {{$product->description}}
            </p>
        </div>
        <div>
            @if (session('message'))
                <h5 class="bg-green-100 rounded-lg py-4 px-5 mb-4 text-base text-green-700" role="alert">
                    {{session('message')}}
                </h5>
            @endif
            <div class="p-1 rounded-lg border border-gray-400">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg  dark:text-white">Add a new comment</h2>
                <form action="{{url('comments')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_name" value="{{$product->name}}">
                    <div class="w-full h-1/2 md:w-full mb-2 mt-2">
                        <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="comment_body" placeholder='Type Your Comment' required></textarea>
                    </div>
                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                </form>
            </div>
        </div>
        <div>
            @forelse ($product->comments as $comment)
                <div class="my-1 rounded-lg border border-gray-400">
                    <h2 class="px-4 text-gray-800 text-lg  dark:text-white">
                        {{$comment->user->name}}
                        <small class="px-5 text-blue-500">{{$comment->created_at->format('d/M/Y  h:i:s')}}</small>
                    </h2>
                    <p class="my-2 px-5  bg-yellow-50 dark:text-black">
                        {{$comment->content}}
                    </p>
                </div>
            @empty
                <p class="my-5 px-5  dark:text-white">No comments yet</p>
            @endforelse
        </div>
    </div>
</x-app-layout>