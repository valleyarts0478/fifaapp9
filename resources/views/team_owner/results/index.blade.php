<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container max-w-4xl px-2 py-12 mx-auto">
          <x-auth-validation-errors class="mb-4" :errors="$errors" />  
          <x-flash-message status="session('status')" />
            <div class="container px-2 py-8 mx-auto">
              @foreach ($games as $game)
              <div class="static">
                <button onclick="location.href='{{ route('team_owner.results.edit', ['result' => $game->id ]) }}'" class="relative top-4 right-0 bg-gray-300 text-xs text-gray-600 rounded-full h-8 w-8">入力</button>      
               </div>
             @if(($game->game_results->home_goal) === null && ($game->game_results->away_goal) === null)
              <div class="flex flex-wrap border rounded-md pt-4 px-2 pb-2 mb-4">
                <div class="w-28 flex flex-col text-center items-center">
                  <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                    @foreach ($team_names as $team_name)
                       @if($team_name->team_name === $game->home_team)
                       <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                       @endif
                    @endforeach
                  </div>
                  <div class="flex-grow">
                    <h2 class="text-gray-900 text-xs title-font font-medium mb-3">{{$game->home_team}}</h2>
                  </div>
                </div>
                    <div class="flex-grow w-20 h-8 text-center">
                      <div>{{ $game->game_date->format('n/j')}}</div>
                    <div>{{ $game->game_date->format('G:i')}}</div>
                    {{-- <div class="text-md mb-2">{{ substr($game->game_date, 5, 5) }}</div>
                    <div class="text-md">{{ substr($game->game_date, 10, 6) }}</div> --}}
                   </div>
                <div class="w-28 flex flex-col text-center items-center">
                  <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                    @foreach ($team_names as $team_name)
                        @if($team_name->team_name === $game->away_team)
                        <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                        @endif
                      @endforeach
                   </div>
                  <div class="flex-grow">
                    <h2 class="text-gray-900 text-xs title-font font-medium mb-3">{{$game->away_team}}</h2>
                  </div>
                </div>
              </div>
              <!--ログインしているチームが試合終了した場合-->
             @else
              <div class="flex flex-wrap border rounded-md pt-4 px-2 pb-2 mb-4">
               <div class="w-28 flex flex-col text-center items-center">
                 <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                   @foreach ($team_names as $team_name)
                      @if($team_name->team_name === $game->home_team)
                      <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                      @endif
                   @endforeach
                 </div>
                 <div class="flex-grow">
                   <h2 class="text-gray-900 text-xs title-font font-medium">{{$game->home_team}}</h2>
                    <span class="w-4 h-4 text-xs text-indigo-400">
                      @if ($game->game_results->home_own_goal >= 1)
                         (OG{{$game->game_results->home_own_goal}})
                      @endif
                    </span>
                 </div>
                </div>
                  <div class="flex-grow w-20 h-8 text-center text-4xl">
                   <div><span class="mr-2">{{ $game->game_results->home_goal }}</span>:<span class="ml-2">{{$game->game_results->away_goal}}</span></div>
                     <div class="text-xs text-center items-center mt-2">
                      {{ $game->game_date->format('n/j')}}ー試合終了
                      {{-- ({{ substr($game->game_date, 5, 5) }}) --}}
                      
                     </div>
                  </div>
               <div class="w-28 flex flex-col text-center items-center">
                 <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                  @foreach ($team_names as $team_name)
                      @if($team_name->team_name === $game->away_team)
                      <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                      @endif
                    @endforeach
                 </div>
                 <div class="flex-grow">
                   <h2 class="text-gray-900 text-xs title-font font-medium">{{$game->away_team}}</h2>
                    <span class="w-4 h-4 text-xs text-indigo-400">
                      @if ($game->game_results->away_own_goal >= 1)
                         (OG{{$game->game_results->away_own_goal}})
                      @endif
                    </span>
                 </div>
               </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
    </section>
</x-app-layout>

