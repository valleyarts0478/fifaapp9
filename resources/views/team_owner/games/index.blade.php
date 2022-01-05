<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-2">
          @foreach ($games as $game)
          <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
              <div class="w-16 h-full mr-2 text-xs bg-gray-100">
               <span class="block"> {{ substr($game->game_date, 0, 4) }}</span>
               <span class="block"> {{ substr($game->game_date, 5, 2) }}</span>
               <span class="block"> {{ substr($game->game_date, 8, 2) }}</span>
              </div>
              <div> 
               <div class="flex items-center">
                 <img alt="team" class="w-6 h-6 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                 <h2 class="text-sm text-gray-900 title-font font-medium">{{$game->home_team}}</h2>
               </div>

                <div class="relative w-4 ml-1 text-xs">VS</div>

               <div class="flex items-center">
                 <img alt="team" class="w-6 h-6 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                 <h2 class="text-sm text-gray-900 title-font font-medium">{{ $game->away_team }}</h2>
               </div>     
              </div>
              {{-- <div class="items-center ml-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-xs">
                <a href="{{ route('team_owner.games.edit', [$game->id]) }}">入力</a>
               </div> --}}

               {{-- <div class="text-center ml-auto">
                <button onclick="location.href='{{ route('team_owner.games.edit', ['game' => $game->id ]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded-md text-sm">入力</button>      
              </div> --}}

            </div>
          </div>
          @endforeach
        </div>
      </div>

    </section>
</x-app-layout>

