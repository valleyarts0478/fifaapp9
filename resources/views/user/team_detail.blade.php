<x-front.app>

    <section class="text-gray-600 body-font">
      <div class="container mx-auto flex px-5 pt-24 items-center justify-center flex-col">
        <img class="lg:w-1/6 md:w-1/3 w-1/2 mb-4 object-cover object-center rounded" src="{{ asset('storage/teams/logo/' . $team->team_logo_url) }}" loading="lazy" alt="team_logo">
        <div class="text-center lg:w-2/3 w-full">
          <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $team->team_name }}</h2>
        </div>

      <div class="flex flex-wrap p-2 py-4 lg:px-36 md:px-8">メンバー:{{ $count }}人</div>
      <div class="flex flex-wrap  pr-8 pl-8 lg:px-36 md:px-8 -m-2">
          @foreach ($players as $player )                  
          <div class="p-2 lg:w-1/2 md:w-1/2 w-full">
            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg shadow">
              
            <x-player_icon :player=$player></x-player_icon>

                  <div class="flex-grow">
                  <span class="flex">
                    <span class="flex w-6 h-6 rounded-full bg-indigo-500 uppercase px-1 py-1 text-xs text-white font-bold">
                      {{ $player->position->position_name }}</span>
                    <h2 class="text-gray-900 title-font font-medium ml-2">{{ $player->player_name }}</h2></span>

                    <span class="flex">
                      <span class="flex w-6 h-6 mt-1 rounded-full bg-indigo-500 uppercase px-1 py-1 text-xs text-white font-bold">
                        NO</span>
                    <h2 class="text-gray-500 title-font font-medium mt-1 ml-2">{{ $player->player_no }}</h2></span>
              </div>
            </div>
          </div>
          @endforeach
      </div>
    </div>
    </section>

</x-front.app>