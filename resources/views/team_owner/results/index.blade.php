<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-2 py-12 mx-auto">
          <x-auth-validation-errors class="mb-4" :errors="$errors" />  
          <x-flash-message status="session('status')" />
            <div class="container px-2 py-8 mx-auto">
              @foreach ($results as $result)
              @if(!is_null($result->home_goal) && ($result->away_goal))
              <div class="flex flex-wrap border rounded-md pt-4 px-2 pb-2 mb-4">
                <div class="w-28 flex flex-col text-center items-center">
                  <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
                      <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                  </div>
                  <div class="flex-grow">
                    <h2 class="text-gray-900 text-xs title-font font-medium mb-3">{{$result->game->home_team}}</h2>
                  </div>
                </div>
                   <div class="flex-grow w-20 h-8 text-center text-4xl">
                    <span class="mr-2">{{ $result->home_goal }}</span>:<span class="ml-2">{{ $result->away_goal }}</span>
                    <div class="text-xs text-center items-center mt-4">
                      試合終了
                     </div>
                   </div>
                <div class="w-28 flex flex-col text-center items-center">
                  <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
                      <circle cx="6" cy="6" r="3"></circle>
                      <circle cx="6" cy="18" r="3"></circle>
                      <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                    </svg>
                  </div>
                  <div class="flex-grow">
                    <h2 class="text-gray-900 text-xs title-font font-medium mb-3">{{$result->game->away_team}}</h2>
                  </div>
                </div>
              </div>
              @else
              <div class="flex flex-wrap border rounded-md pt-4 px-2 pb-2 mb-4">
                <div class="w-28 flex flex-col text-center items-center">
                  <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
                      <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                  </div>
                  <div class="flex-grow">
                    <h2 class="text-gray-900 text-xs title-font font-medium mb-3">{{$result->game->home_team}}</h2>
                  </div>
                </div>
                   <div class="flex-grow w-20 h-8 text-center">
                    <div class="text-md mb-2">{{ substr($result->game->game_date, 5, 5) }}</div>
                    <div class="text-md">{{ substr($result->game->game_date, 10, 6) }}</div>
                   </div>
                <div class="w-28 flex flex-col text-center items-center">
                  <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
                      <circle cx="6" cy="6" r="3"></circle>
                      <circle cx="6" cy="18" r="3"></circle>
                      <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                    </svg>
                  </div>
                  <div class="flex-grow">
                    <h2 class="text-gray-900 text-xs title-font font-medium mb-3">{{$result->game->away_team}}</h2>
                  </div>
                </div>
              </div>
              @endif
              

            

           

              {{-- <div class="relative p-2 lg:w-1/2 md:w-1/2 w-full mb-4">
                <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                  <div class="w-16 h-20 mr-2 text-xs bg-gray-100">
                   <span class="block"> {{ substr($result->game->game_date, 0, 4) }}</span>
                   <span class="block"> {{ substr($result->game->game_date, 5, 2) }}</span>
                   <span class="block"> {{ substr($result->game->game_date, 8, 2) }}</span>
                  </div>
                  <div>
                    <div class="static">
                      <button onclick="location.href='{{ route('team_owner.results.edit', ['result' => $result->id ]) }}'" class="absolute top-0 right-0 bg-indigo-600 text-xs text-white rounded-full h-8 w-8">入力</button>      
                    </div>
                    <div class="flex items-center">
                      <img alt="team" class="w-6 h-6 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                      <h2 class="text-sm text-gray-900 title-font font-medium">{{$result->game->convention->convention_no}}</h2>
                    </div>
                    <div class="flex items-center">
                      <img alt="team" class="w-6 h-6 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                      <h2 class="text-sm text-gray-900 title-font font-medium">{{$result->game->league->league_name}}</h2>
                    </div>
                   <div class="flex items-center">
                     <img alt="team" class="w-6 h-6 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                     <h2 class="text-sm text-gray-900 title-font font-medium">{{$result->game->home_team}}</h2>
                   </div>

                   <div class="relative w-4 ml-1 text-xs">VS</div>

                   <div class="flex items-center">
                     <img alt="team" class="w-6 h-6 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                     <h2 class="text-sm text-gray-900 title-font font-medium">{{ $result->game->away_team }}</h2>
                   </div>
                  </div>
                  <div class="flex items-center">
                    <h2 class="text-xl ml-4 border text-center rounded-md border-gray-400 border-opacity-75 w-8 h-8 text-gray-900 title-font font-medium">{{ $result->home_goal }}</h2>
                    <h2 class="text-xl ml-4 border text-center rounded-md border-gray-400 border-opacity-75 w-8 h-8 text-gray-900 title-font font-medium">{{ $result->away_goal }}</h2>
                   </div>
                </div>
              </div> --}}
              @endforeach
            </div>
          </div>

    </section>
</x-app-layout>

