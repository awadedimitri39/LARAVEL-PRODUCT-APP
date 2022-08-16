<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{$category->name}}
        </h2>
    </x-slot>

    <!-- Session Status -->
    <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach
    </div>
    <form method="POST" action="{{route('admin.categories.update',$category)}}" class="mt-4" enctype="multipart/form-data">

        @method('put')
        @csrf
        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$category->name}}"/>
        </div>

        <!-- Submit -->
        <div class="my-4">
            <x-button class="ml-3">
                {{ __('Edit category') }}
            </x-button>
        </div>          
    </form>
</x-app-layout>
