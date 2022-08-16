<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Management') }}
        </h2>
    </x-slot>
    @if (session('message'))
        <h5 class="bg-green-100 rounded-lg py-4 px-5 mb-4 text-base text-green-700" role="alert">
            {{session('message')}}
        </h5>
    @endif
    <div class="mt-3">
      <button type="button" class="flex justify-start items-center space-x-6 text-white bg-blue-500 hover:bg-blue-700 rounded px-3 py-2  w-full md:w-52">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus"
          class="w-3 mr-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor"
            d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z">
          </path>
        </svg>
        <a href="{{route('admin.categories.create')}}">Add Category</a>
      </button>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                  <tr>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      #
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Name
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Created_at
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Updated_at
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4"></th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4"></th>
                  </tr>
                </thead class="border-b">
                <tbody>
                  @forelse ($categories as $category)
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$category->id}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{Str::limit($category->name, 15, '...')}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$category->created_at->format('d M Y H:m:s')}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$category->updated_at->format('d M Y H:m:s')}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <button type="button" class="inline-block px-6 py-2.5 bg-green-500 hover:bg-green-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md">
                          <a href="{{route('admin.categories.edit', $category)}}">Edit</a>
                        </button>
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <form action="{{route('admin.categories.destroy', $category)}}" method="POST" id="destroy-post-form">
                          @csrf
                          @method('delete')
                          <x-button class="inline-block px-3 py-2.5 text-white bg-red-500 hover:bg-red-600 font-medium text-xs">Delete</x-button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr class="bg-white border-b">
                      <td colspan="7" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                        {{_('No categories found')}}
                      </td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
