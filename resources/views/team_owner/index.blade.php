<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>
    <x-flash-message status="session('status')" />
    <div class="mx-auto max-w-xl rounded overflow-hidden shadow-lg">
        @foreach($team_owners as $team_owner)
        <div class="max-w-md mx-auto mt-4">
          <img class="w-36 mx-auto" src="{{ asset('storage/teams/logo/' . $team_owner['team_logo_url']) }}" alt="team_logo">
        </div>
        <div class="px-6 pt-4">
          <div class="text-center font-bold text-xl mb-2">{{ $team_owner->team_name }}</div>
         </div>
        <div class="px-6">
        <div class="text-center font-bold text-md mb-2">メンバー:{{ $count }}人</div>
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
                            {{-- <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80"> --}}
                            <x-player_icon :player=$player></x-player_icon>
                            <div class="flex-grow">
                            <span class="flex">
                              <span class="flex w-6 h-6 rounded-full bg-indigo-500 uppercase px-1 py-1 text-xs text-white font-bold">
                              {{ $player->position->position_name }}
                              </span>
                                <h2 class="text-gray-900 title-font font-medium ml-2">{{ $player->player_name }}</h2></span>
                              <span class="flex">
                               <span class="flex w-6 h-6 rounded-full bg-indigo-500 uppercase px-1 py-1 mt-1 text-xs text-white font-bold">
                                NO</span>
                                <h2 class="text-gray-900 title-font font-medium mt-1 ml-2">{{ $player->player_no }}</h2>
                              </span>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
           </div>
        </div>
      </div>

</x-app-layout>

