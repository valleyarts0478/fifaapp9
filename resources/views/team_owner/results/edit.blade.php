<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 bg-white border-b border-gray-200">
              <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />  
                <x-flash-message status="session('status')" />
                <form method="post" action="{{ route('team_owner.results.update', ['result' => $gameResult->id ]) }}" >
                     @csrf
                     <!--トータル得点ここから -->
                    <div class="container mx-auto flex">

                      <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg flex flex-col md:mx-auto w-full mt-10 md:mt-0 relative z-10">
                        <h2 class="text-gray-900 text-md text-center mb-1 font-medium title-font">{{$gameResult->game->game_date}}</h2>
                        <h2 class="mx-auto text-gray-900 text-md mb-1 font-medium title-font">
                            <div class="text-center">{{$gameResult->game->home_team}}</div>
                            <div class="text-sm text-center">VS</div>
                            <div class="text-center">{{$gameResult->game->away_team}}</div>
                        </h2>
                        {{-- <div class="relative mb-4 mx-auto"> --}}
                          <div for="goal" class="text-sm text-center mt-4 text-gray-600">得点</div>
                          <div class="mx-auto">
                          @if ($team_owner->team_name === $gameResult->game->home_team)
                            <input type="number" pattern="\d*" id="goal" name="total_goal" placeholder="得点" value="{{$gameResult->home_goal}}" class="w-28 h-12 mb-2 text-center placeholder-gray-300 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          @elseif ($team_owner->team_name === $gameResult->game->away_team)
                            <input type="number" pattern="\d*" id="goal" name="total_goal" placeholder="得点"　value="{{$gameResult->away_goal}}" class="w-28 h-12 mb-2 text-center placeholder-gray-300 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          @else 
                            <div>チーム名が一致していません。</div>
                          @endif
                        </div>
                           <!--オウンゴール-->
                        <div for="own_goal" class="text-sm text-center text-gray-600 ml-2">OG</div>
                        <div class="mx-auto">
                        @if ($team_owner->team_name === $gameResult->game->home_team)
                        <input type="number" pattern="\d*" id="own_goal" name="own_goal" value="{{$gameResult->home_own_goal}}" class="w-16 text-center bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @elseif ($team_owner->team_name === $gameResult->game->away_team)
                        <input type="number" pattern="\d*" id="own_goal" name="own_goal" value="{{$gameResult->away_own_goal}}" class="w-16 text-center bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @endif
                        </div>
                        {{-- </div> --}}

                        <!--ゴール・アシスト部分ここから -->
                             <div class="relative mt-4 mb-4 mx-auto">
                              <label for="goal" class="leading-7 text-sm text-gray-600 mx-auto">得点・アシスト入力</label>
                              @foreach($players as $player)
                                 <div>{{$player->player_name}}</div>
                                 <input type="number" pattern="\d*" id="goals" name="goals[{{$player->player_name}}]" value="{{$player_team_goals[$player->player_name]['goals']}}" placeholder="G" class="w-24 placeholder-gray-300 mb-2 mr-2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                 <input type="number" pattern="\d*" id="assists" name="assists[{{$player->player_name}}]" value="{{$player_team_goals[$player->player_name]['assists']}}" placeholder="A" class="w-24 placeholder-gray-300 mb-2 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              @endforeach
                             </div>
                        <!--ゴール・アシスト部分ここまで -->
                             <div class="p-2 flex justify-around w-full mt-4">
                               <button type="button" onclick="location.href='{{ route('team_owner.results.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                               <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                             </div>
                         </div>

                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>