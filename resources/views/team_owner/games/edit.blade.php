<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
          <h1 class="sm:text-xl text-xl font-medium title-font mb-2 text-gray-900">スタッツ入力</h1>
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
          <table class="table-auto w-full text-center whitespace-no-wrap">
            <thead>
              <tr>
                <th class="py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">選手名</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">G</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">A</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">memo</th>
              </tr>
            </thead>
            <form method="post" action="{{ route('team_owner.games.update', ['game' => $game->id]) }}" >
              @csrf
              
            {{-- <input type="text" id="player_id" name="player_id[]" class="w-8 h-8 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
            <tbody>
              <tr>
                <td>
            {{-- @for ($i = 1; $i <= 2; $i++) --}}
              <select name="player_name" id="player_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @foreach($players as $player) 
                <option value='' disabled selected style='display:none;'>選択してください</option>
                 <option value="{{ $player->player_name }}" @if($game->p_name1 === $player->player_name) selected @endif>{{ $player->player_name }}</option>
                @endforeach
              </select>
            {{-- @endfor --}}
              {{-- <select name="player_name2" id="player_name2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @foreach($players as $player) 
                <option value='' disabled selected style='display:none;'>選択してください</option>
                <option value="{{ $player->player_name }}" @if($game->p_name2 === $player->player_name) selected @endif>{{ $player->player_name }}</option>
                @endforeach
              </select> --}}
            </td>
          </tr>
              <tr>
                {{-- <td class="border-b-2 border-gray-200 px-4 py-3">
                  <input type="text" id="goal" name="goal" style="font-size:0.75rem;" value="" class="w-8 h-8 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </td> --}}
                {{-- <td class="border-b-2 border-gray-200 px-4 py-3">
                  <input type="text" id="assist" name="assist" value="{{ $player->assist }}" class="w-8 h-8 bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </td>
                <td class="border-b-2 border-gray-200 px-4 py-3 text-xs text-gray-900">Free</td> --}}
              </tr>
            </tbody>

          </table>

        </div>
        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
          <div class="p-2 flex justify-around w-full mt-4">
            <button type="button" onclick="location.href='{{ route('team_owner.games.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信</button>
          </div>
        </div>
      </div>
    </section>
</x-app-layout>

