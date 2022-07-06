<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <table class="table-auto">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">試合日</th>
                        <th class="px-4 py-2">節</th>
                        <th class="px-4 py-2">試ID</th>
                        <th class="px-4 py-2">合否</th>
                    </tr>
                    </thead>
                    @foreach ($goal_assists as $data)
                    <tbody>
                    <tr>
                        <td class="border px-4 py-2">{{$data->game_result->game->game_date}}</td>
                        <td class="border px-4 py-2">{{$data->game_result->section}}</td>
                        <td class="border px-4 py-2">{{$data->game_result_id}}</td>
                        <td class="border px-4 py-2">
                            @if($data->game_result->home_goal === NULL or  $data->game_result->away_goal === NULL)
                            空欄あり
                            @elseif(($data->game_result->home_goal + $data->game_result->away_goal) === $data->total_goal)
                            {{-- @elseif(($data->game_result->home_goal + $data->game_result->away_goal + $data->game_result->home_own_goal + $data->game_result->away__own_goal) == $data->total_goal) --}}
                            OK
                            @else
                            <span class="text-ral-200 font-bold">NG</span>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $goal_assists->links() }}
           </div>
        </div>
      </div>
</x-app-layout>