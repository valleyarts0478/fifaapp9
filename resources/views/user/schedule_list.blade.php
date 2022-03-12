<x-front.app>

<div class="bg-white py-6 sm:py-8 lg:py-12 max-w-screen-lg mx-auto">
  <ul class="tab">
    <li><a href="#first">RAL-E 1部</a></li>
    <li><a href="#second">RAL-E 2部</a></li>
  </ul>

  @if($game1_count === 0)
   順位表はありません。
  @else
 <div id="first" class="area">

    <div class="container px-4 md:px-8 mx-auto">
      
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 md:gap-6 xl:gap-8">
        <!-- article - start -->
        @foreach($team_list as $date => $teams)      
         
        <a href='{{ route('user.day.schedule', ['team' => $date ]) }}'" class="group h-48 md:h-64 xl:h-96 flex flex-col bg-gray-100 rounded-lg shadow-lg overflow-hidden relative">
          <img class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" src="{{ asset('storage/teams/' . "ral_card1.jpg") }}" alt="team_logo">
          <div class="bg-gradient-to-r from-ral-400 md:via-transparent to-transparent absolute inset-0 pointer-events-none"></div>
  
          <div class="relative p-4 mt-auto">
            <h2 class="text-gray-200 transition duration-100 mb-2">Schedule</h2>
            <span class="block text-white font-semibold text-2xl"><h2>{{ $date }}～</h2></span>  
            <span class="text-ral-300 font-semibold">Read more</span>
          </div>
        </a>     
         
        @endforeach
        <!-- article - end -->       
      </div>
    </div>
    
  </div><!--first area end-->
  @endif

  @if($game2_count === 0)
  順位表はありません。
  @else
  <div id="second" class="area">
    
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 md:gap-6 xl:gap-8">
      <!-- article - start -->
      @foreach($team_list_second as $date => $teams)      
       
      <a href='{{ route('user.day.schedule2', ['team' => $date ]) }}'" class="group h-48 md:h-64 xl:h-96 flex flex-col bg-gray-100 rounded-lg shadow-lg overflow-hidden relative">
        <img class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" src="{{ asset('storage/teams/' . "ral_card1.jpg") }}" alt="team_logo">
        <div class="bg-gradient-to-r from-ral-400 md:via-transparent to-transparent absolute inset-0 pointer-events-none"></div>
  
        <div class="relative p-4 mt-auto">
          <h2 class="text-gray-200 transition duration-100 mb-2">Schedule</h2>
          <span class="block text-white font-semibold text-2xl"><h2>{{ $date }}～</h2></span>  
          <span class="text-ral-300 font-semibold">Read more</span>
        </div>
      </a>
       
      @endforeach
      <!-- article - end -->       
    </div>
  
  </div><!--second area end-->
  @endif




</div>



  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="{{mix('js/tab.js')}}"></script>
</x-front.app>