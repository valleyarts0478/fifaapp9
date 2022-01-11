<x-front.app>

   <x-slot name="header"></x-slot>

        <x-flash-message status="session('status')" />
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
                @endforeach
              </div>
            </div>
      </section>
        <x-slot name="footer"></x-slot>

</x-front.app>


