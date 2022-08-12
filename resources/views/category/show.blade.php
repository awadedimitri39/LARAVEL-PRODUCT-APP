<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$category->name}}
        </h2>
    </x-slot>
    <div class="grid grid-cols-4 gap-2">
        @forelse ($category->products as $product)
        <div class="m-3 p-1 rounded-lg border border-gray-400 shadow dark:bg-blue-50 dark:border-gray-700">
            <a href="{{route('product.show',$product)}}">
                <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">
                    {{$product->name}}
                </h5>
                <div class="text-xs font-bold uppercase text-blue-600 mt-1 mb-2">{{$product->created_at->format('d M Y')}}</div>
            </a>
        </div>
        @empty
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blue-50 border-b border-gray-200">
                        No products found
                    </div>
                </div>
            </div>
        </div>
    @endforelse
</x-app-layout>