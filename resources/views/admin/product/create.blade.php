<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <!-- Session Status -->
    <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach
    </div>
    <form method="POST" action="{{route('admin.products.store')}}" class="mt-4" enctype="multipart/form-data">

        @csrf
        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"/>
        </div>

        <!-- Description -->
        <div class="mt-4">
            <x-label for="description" :value="__('Description')" />
            <textarea name="description" id="description" cols="150" rows="8"></textarea>
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-label for="image" :value="__('Image')" />
            <x-input id="image" type="file" name="image"></x-input>
        </div>

        <!-- Category -->
        <div class="mt-4">
            <x-label for="category" :value="__('Category')" />
            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit -->
        <div class="my-4">
            <x-button class="ml-3">
                {{ __('Add product') }}
            </x-button>
        </div>          
    </form>
</x-app-layout>
