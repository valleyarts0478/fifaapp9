<x-front.app>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
        <div class="text-ral-400 sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center border-solid border-2 rounded-full border-ral-100 bg-opacity-50 text-4xl flex-shrink-0">
          {{$home_game->game_results->home_goal}}
        </div>
        @if($home_game->game_results->home_own_goal !== NULL)
        <div class="text-sm text-ral-200 font-semibold mx-auto">OG:{{$home_game->game_results->home_own_goal}}</div>
        @endif
        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
          <div class="mx-auto">HOME</div>
          <h2 class="mb-4"><img class="inline w-8 h-8 mr-2" src="{{ asset('storage/teams/logo/' . $home_owner->team_logo_url) }}" alt="team_logo"><span class="text-xl font-bold">{{$home_owner->team_name}}</span></h2>
          @foreach ($home_goal_assists as $home)
          <p class="mb-2 border-ral-100 border-solid border-b-2 text-xl">{{$home->player_name}}</p>
            <div class="flex mb-2 leading-relaxed text-base">
              <div class="w-1/2 text-lg">
                @if($home->goals === NULL)
                <span class="opacity-50">G:{{$home->goals = 0}}</span>
                @elseif($home->goals >= 0)
                G:{{$home->goals}}
                @endif
              </div>
              <div class="w-1/2 text-lg">
                @if($home->assists === NULL)
                <span class="opacity-50">A:{{$home->assists = 0}}</span>
                @elseif($home->assists >= 0)
                A:{{$home->assists}}
                @endif
              </div>
            </div>
          @endforeach
          </div>
      </div>

      <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
        <div class="flex-grow sm:text-left text-center sm:mt-0">
          @if($home_game->game_results->away_own_goal !== NULL)
          <div class="text-sm text-ral-200 font-semibold mx-auto">OG:{{$home_game->game_results->away_own_goal}}</div>
          @endif
          <div class="mx-auto mt-6">AWAY</div>
          <h2 class="mb-4"><img class="inline w-8 h-8 mr-2" src="{{ asset('storage/teams/logo/' . $away_owner->team_logo_url) }}" alt="team_logo"><span class="text-xl font-bold">{{$away_owner->team_name}}</span></h2>
          @foreach ($away_goal_assists as $away)
          <p class="mb-2 border-ral-300 border-solid border-b-2 text-xl">{{$away->player_name}}</p>
            <div class="flex mb-2 leading-relaxed text-base">
              <div class="w-1/2 text-lg">
                @if($away->goals === NULL)
                <span class="opacity-50">G:{{$away->goals = 0}}</span>
                @elseif($away->goals >= 0)
                G:{{$away->goals}}
                @endif
              </div>
              <div class="w-1/2 text-lg">
                @if($away->assists === NULL)
                <span class="opacity-50">A:{{$away->assists = 0}}</span>
                @elseif($away->assists >= 0)
                A:{{$away->assists}}
                @endif
              </div>
            </div>
          @endforeach
        </div>
        <div class="text-ral-400 sm:w-32 sm:order-none order-first sm:h-32 h-20 w-20 sm:ml-10 inline-flex items-center justify-center border-solid border-2 rounded-full border-ral-300 bg-opacity-50 text-4xl flex-shrink-0">
          {{$games->game_results->away_goal}}
        </div>
    </div>

    </div>
  </section>

                 

</x-front.app>
