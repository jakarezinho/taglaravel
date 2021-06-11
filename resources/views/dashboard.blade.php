<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <!--/ <x-jet-welcome />-->
               <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
               
                   <h2 class="text-5xl"> Hello {{ Auth::user()->name }} <img class="h-20 w-20 rounded-full object-cover inline" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
              </h2>
              <p> Numero de tags no mapa<span class="font-bold"> ({{Auth::user()->locais->count()}}) </span> </p>
              <p><a class=" text-blue-500 text-sm" href="{{ route('profile.show') }}">Gerir  a tua conta na plataforma  </a> </p>
                  </div>
             
               <div class="p-6"> 
               @if (Auth::user()->locais->count() > 0)
               <p>TAGS</p>
                    @foreach (  Auth::user()->locais as $local )
                       {{$local->title}} - 
                   @endforeach
               @endif
                  
                        
               </div>


              
             
       
            </div>
        </div>
    </div>
</x-app-layout>
