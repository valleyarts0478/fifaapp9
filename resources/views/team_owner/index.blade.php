<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>
    <x-flash-message status="session('status')" />
    <div class="mx-auto max-w-xl rounded overflow-hidden shadow-lg">
        @foreach($team_owners as $team_owner)
        <div class="w-1/2 mx-auto">
          <img src="{{ asset('storage/teams/' . $team_owner['team_logo_url']) }}" alt="Sunset in the mountains">
        </div>
        <div class="px-6 pt-4">
          <div class="text-center font-bold text-xl mb-2">{{ $team_owner->team_name }}</div>
         </div>
        <div class="px-6">
        <div class="text-center font-bold text-md mb-2">メンバー：{{ $count }}人</div>
        </div>
        <div class="px-6 pt-4 pb-2">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $team_owner->convention->convention_no }}</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $team_owner->league->league_name }}</span>
        </div>
        @endforeach

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <x-flash-message status="session('status')" />
                <div class="flex flex-wrap -m-2">
                    @foreach ($players as $player )                    
                    <div class="p-2 lg:w-1/2 md:w-1/2 w-full">
                      <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                            <div class="flex-grow">
                            <span class="flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                              </svg><h2 class="text-gray-900 title-font font-medium ml-2">{{ $player->player_name }}</h2></span>

                              <span class="flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                              </svg><h2 class="text-gray-500 title-font font-medium ml-2">NO.{{ $player->player_no }}</h2></span>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
           </div>
        </div>
      </div>

</x-app-layout>

