<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--/ <x-jet-welcome />-->
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                    <h2 class="text-2xl"> Hello {{ Auth::user()->name }} <img
                            class="h-20 w-20 rounded-full object-cover inline"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> Admin
                    </h2>

                </div>


                <!--/////-->


                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Users</h2>
                        </div>

                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>

                                        <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                User
                                            </th>
                                            <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Tags
                                        </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Created at
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if ($user->id != 1)
                                                <tr>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 w-10 h-10">
                                                                <img src="{{ $user->profile_photo_url }}">
                                                            </div>
                                                            <div class="ml-3">
                                                                <p class="text-gray-900 whitespace-no-wrap">
                                                                    
                                                                    {{ $user->name}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap"> 
                                                            <ul>
                                                                @foreach ($user->locais()->get() as $local )
                                                                   <li>  {{$local->title}} / {{$local->adress}} </li>
                                                                @endforeach
                                                               </ul>
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap"> {{ $user->email }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $user->created_at }}
                                                        </p>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <span
                                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                            <span aria-hidden
                                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                            <span class="relative">Activo</span>
                                                        </span>
                                                    </td>
                                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                        <form method="POST" action="{{ route('admin.delete-user') }}">
                                                            @csrf
                                                            <input type="hidden" name="user" id="{{ $user->id }}"
                                                                value="{{ $user->id }}">
                                                            <input
                                                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                                                                type="submit" onclick="return confirm(' vai eliminar este usuario ?')" value="Eliminar">

                                                            </a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif


                                        @endforeach

                                    </tbody>
                                </table>

                                <div
                                    class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between ">
                                    <p> page {{ $users->links() }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    </div>

</x-app-layout>
