<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("My comments")}}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 p-1 rounded-lg border border-gray-400 shadow dark:bg-gray-800 dark:border-gray-700">
        @forelse ($user->comments as $comment)
            <div class="my-1 rounded-lg border border-gray-400">
                <h2 class="px-4 text-gray-800 text-lg  dark:text-white">
                    {{$comment->product->name}}
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
</x-app-layout>