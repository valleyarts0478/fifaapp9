<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">

       <div class="container px-5 py-24 mx-auto">
         <div class="flex flex-wrap w-full -m-2">

              <div class="mx-auto">
                 <form method="post" action="{{ route('team_owner.games.store') }}" >
                       @csrf
                        <div class="w-20 h-20 mx-auto">
                          <div class="text-sm">TOTALGOAL</div>
                          <div class="flex items-center justify-center shadow-md font-bold border align-middle rounded-md text-xl w-20 h-16">test</div>
                        </div>
                        <div class="flex">
                         <div class="w-60 mr-4 mb-4">
                           <label for="player_id" class="leading-7 text-sm text-gray-600">選手名1</label>
                           {{-- <select name="player1" id="player1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
                             <select name="player_id" id="player_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          
                            @foreach($players as $player)
                             <option value="{{$player->id}}">
                             {{ $player->player_name }}
                             </option>
                            @endforeach
                           
                            {{-- @foreach($game->players as $player)
                             <option value="">
                             {{ $player->player_name }}
                             </option>
                           @endforeach --}}
     
                           {{-- <select name="team_owner_id" id="team_owner_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                             <option value="{{ $player->team_owner->id }}" >
                               {{ $player->team_owner->team_name }}
                             </option>
                          </select> --}}

                           </select>
                          </div>
                           {{-- <div class="w-16">
                            <label for="goal1" class="leading-7 text-sm text-gray-600">Goal</label>
                            <input type="text" id="goal1" name="goal1" value="{{ $game->goal1 }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
                           </div> 
                        </div>
                        {{-- <div class="flex">
                          <div class="w-60 mr-4 mb-4">
                            <label for="player2" class="leading-7 text-sm text-gray-600">選手名2</label>
                            <select name="player2" id="player2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach($players as $player)
                            <option selected="selected" value="{{ $player->player_name }}" >
                              {{ $player->player_name }}
                              </option>
                            @endforeach
                            </select>
                           </div>
                            <div class="w-16">
                             <label for="goal2" class="leading-7 text-sm text-gray-600">Goal</label>
                             <input type="text" id="goal2" name="goal2" value="{{ $game->goal2 }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div> 
                         </div> --}}

              <div class="p-2 flex justify-around w-full mt-4">
                <button type="button" onclick="location.href='{{ route('team_owner.games.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信</button>
              </div>

                  </form>
                </div>
          </div>
       </div>
    </section>
</x-app-layout>

