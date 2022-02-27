<x-front.app>

  <div class="max-w-screen-lg mx-auto">

  <ul class="tab">
    <li><a href="#first">TEAM 1部</a></li>
    <li><a href="#second">TEAM 2部</a></li>
  </ul>
    
<div id="first" class="area">

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-lg px-4 md:px-8 mx-auto">

          <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-8">
              @foreach($team_lists as $team_list)
              @if($team_list->league_id === 1)
              <!-- person - start -->
            <div class="flex flex-col items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                <div class="w-24 md:w-32 h-24 md:h-32 bg-gray-200 rounded-full overflow-hidden shadow-lg mb-2 md:mb-4">
                  <img class="w-full h-full object-cover object-center" src="{{ asset('storage/teams/logo/' . $team_list->team_logo_url) }}" loading="lazy" alt="team_logo">
                </div>
                <div>
                  <div class="text-gray-800 md:text-lg font-bold text-center">{{ $team_list->team_name }}</div>
                  
                  <div class="text-center my-2 mr-2">
                    <button onclick="location.href='{{ route('user.teams.show', ['team' => $team_list->id ]) }}'" class="text-gray-500 text-sm md:text-base text-center md:mb-4">Details</button>    
                  </div>
                  <div class="text-center my-2 mr-2">
                    <button onclick="location.href='{{ route('user.team.schedule', ['team' => $team_list->id ]) }}'" class="text-gray-500 text-sm md:text-base text-center md:mb-4">Schedule</button>    
                  </div>
                  {{-- <p class="text-gray-500 text-sm md:text-base text-center mb-3 md:mb-4">Team Details</p> --}}
        
                  <!-- social - start -->
                  <div class="flex justify-center">
                    <div class="flex gap-4">
                      <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
                        <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                      </a>
                    </div>
                  </div>
                  <!-- social - end -->
                </div>
              </div>
              <!-- person - end -->
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>


    <div id="second" class="area">
      <div class="bg-white py-6 sm:py-8 lg:py-12">
          <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
  
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-8">
                @foreach($team_lists as $team_list)
                @if($team_list->league_id === 2)
                <!-- person - start -->
              <div class="flex flex-col items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                  <div class="w-24 md:w-32 h-24 md:h-32 bg-gray-200 rounded-full overflow-hidden shadow-lg mb-2 md:mb-4">
                    <img class="w-full h-full object-cover object-center" src="{{ asset('storage/teams/logo/' . $team_list->team_logo_url) }}" loading="lazy" alt="team_logo">
                  </div>
                  <div>
                    <div class="text-gray-800 md:text-lg font-bold text-center">{{ $team_list->team_name }}</div>
                    
                    <div class="text-center my-2 mr-2">
                      <button onclick="location.href='{{ route('user.teams.show', ['team' => $team_list->id ]) }}'" class="text-gray-500 text-sm md:text-base text-center mb-3 md:mb-4">Details</button>    
                    </div>
                    <div class="text-center my-2 mr-2">
                      <button onclick="location.href='{{ route('user.team.schedule', ['team' => $team_list->id ]) }}'" class="text-gray-500 text-sm md:text-base text-center mb-3 md:mb-4">Schedule</button>    
                    </div>
                    {{-- <p class="text-gray-500 text-sm md:text-base text-center mb-3 md:mb-4">Team Details</p> --}}
          
                    <!-- social - start -->
                    <div class="flex justify-center">
                      <div class="flex gap-4">
                        <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
                          <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                          </svg>
                        </a>
          
                        <a href="#" target="_blank" class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
                          <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                          </svg>
                        </a>
                      </div>
                    </div>
                    <!-- social - end -->
                  </div>
                </div>
                <!-- person - end -->
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
      
    </div>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="{{mix('js/tab.js')}}"></script>
</x-front.app>