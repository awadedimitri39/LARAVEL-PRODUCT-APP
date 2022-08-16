<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>
    @if (session('message'))
        <h5 class="bg-green-100 rounded-lg py-4 px-5 mb-4 text-base text-green-700" role="alert">
            {{session('message')}}
        </h5>
    @endif
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
                      Email
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Password
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Created_at
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                      Updated_at
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4"></th>
                  </tr>
                </thead class="border-b">
                <tbody>
                  @forelse ($users as $user)
                    <tr class="bg-white border-b">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$user->id}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{Str::limit($user->name, 15, '...')}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{Str::limit($user->email, 15, '...')}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{Str::limit($user->password, 15, '...')}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$user->created_at->format('d M Y H:m:s')}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{$user->updated_at->format('d M Y H:m:s')}}
                      </td>
                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <form action="{{route('admin.users.destroy', $user)}}" method="POST" id="destroy-post-form">
                          @csrf
                          @method('delete')
                          <x-button class="inline-block px-3 py-2.5 text-white bg-red-500 hover:bg-red-600 font-medium text-xs">Delete</x-button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr class="bg-white border-b">
                      <td colspan="7" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                        {{_('No users found')}}
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
