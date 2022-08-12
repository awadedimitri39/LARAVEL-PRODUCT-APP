<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="max-h-max grid grid-rows-1 grid-flow-col gap-4 p-1 border border-gray-400 shadow dark:border-gray-700">
        <div class="col-span-1 p-3 dark:bg-blue-400">
            <a href="{{route('categories.index')}}" class="text-white">Categories</a>
        </div>
        <div class="col-span-1 p-3 dark:bg-green-400">
            <a href="{{route('products.index')}}" class="text-white">Products</a>
        </div>
        <div class="col-span-1 p-3 dark:bg-yellow-400">
            <a href="{{route('comment.show',Auth::user()->id)}}" class="text-white">All my comments</a>
        </div>
    </div>
</x-app-layout>
