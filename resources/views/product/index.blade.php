<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-4 gap-2">
        @foreach ($products as $product)
            <div class="m-3 p-1 rounded-lg border border-gray-400 shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="">
                    <img class="px-1 py-1" src="{{$product->image}}" alt="step3">
                </a>
                <h5 class="my-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $product->name }}
                </h5>
                <div class="text-xs font-bold uppercase text-blue-600 mt-1 mb-2">{{$product->created_at->format('d M Y')}}</div>
                <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2">{{$product->category->name}}</div>
                <a href="{{Route('product.show',$product)}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                </a>
            </div>
        @endforeach
    </div> 
</x-app-layout>