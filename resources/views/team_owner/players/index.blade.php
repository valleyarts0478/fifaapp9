<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
      <div class="text-center my-2 mr-2">
        <button onclick="location.href='{{ route('team_owner.players.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded-md text-lg">新規登録</button>    
    </div>
        <x-flash-message status="session('status')" />
      <div class="flex flex-wrap p-2 mx-auto py-4 lg:px-36 md:px-8 -m-2">メンバー：{{ $count }}人</div>
        <div class="flex flex-wrap lg:px-36 md:px-8 -m-2">
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
                <div class="text-center">
                  <button onclick="location.href='{{ route('team_owner.players.edit', ['player' => $player->id ]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded-md text-sm">編集</button>      
                </div>
              </div>
            </div>
            @endforeach
        </div>
   </div>
</x-app-layout>

