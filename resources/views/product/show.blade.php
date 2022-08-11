<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$product->name}}
        </h2>
    </x-slot>
    <div class="grid grid-rows-3 grid-flow-col gap-4 p-1 rounded-lg border border-gray-400 shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="row-span-3">
            <img src="{{$product->image}}" alt="step3">
        </div>
        <div class="col-span-2">
            <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $product->name }}
            </h5>
            <div class="text-xs font-bold uppercase text-blue-600 mt-1 mb-2">{{$product->created_at->format('d M Y')}}</div>
            <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">{{$product->category->name}}</div>
            <p class="mb-3 font-semibold text-base text-gray-700 dark:text-gray-400">
                {{$product->description}}
            </p>
        </div>
        <div class="row-span-2 col-span-2">
            <div class="p-1 rounded-lg border border-gray-400">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg  dark:text-white">Add a new comment</h2>
                <form action="" method="post">
                    <div class="w-full md:w-full mb-2 mt-2">
                        <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                    </div>
                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>