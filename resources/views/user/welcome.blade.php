<x-front.app>

 <div class="max-w-screen-lg py-4 mx-auto">
    <div class="container md:px-8 mx-auto">

      <section class="min-h-96 flex justify-center items-center flex-1 shrink-0 bg-gray-100 overflow-hidden shadow-lg relative py-16 md:py-20 xl:py-48">
        <!-- image - start -->
        <img src="{{asset('storage/top/' . "bg_01.jpg")}}" loading="lazy" alt="Photo by Fakurian Design" class="w-full h-full object-cover object-center absolute inset-0" />
        <!-- image - end -->
  
        <!-- overlay - start -->
        <div class="bg-ral-400 mix-blend-multiply opacity-30 absolute inset-0"></div>
        <!-- overlay - end -->
  
        <!-- text start -->
        <div class="sm:max-w-xl flex flex-col items-center relative p-4">
          <p class="text-white text-lg sm:text-xl text-center mb-4 md:mb-8">FIFA PROCLUB</p>
          <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold text-center mb-8 md:mb-12">Welcome to RAL-E</h1>
  
          <div class="w-full flex flex-col sm:flex-row sm:justify-center gap-2.5">
            <a href="#" class="inline-block bg-ral-400 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Start now</a>
  
            <a href="#" class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Take tour</a>
          </div>
        </div>
        <!-- text end -->
      </section>

      <section class="text-gray-600 body-font">
        <div class="container px-4 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
            
            <div class="p-4 md:w-1/3">
              <div class="rounded-lg overflow-hidden">
                  <a href="/team_list"><img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{asset('storage/top/' . "team_list_bn.jpg")}}" alt="team_list"></a>
              </div>
            </div>
            <div class="p-4 md:w-1/3">
              <div class="rounded-lg overflow-hidden">
                  <a href="/team_rank"><img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{asset('storage/top/' . "team_ranking_bn.jpg")}}" alt="team_ranking"></a>
              </div>
            </div>
            <div class="p-4 md:w-1/3">
              <div class="rounded-lg overflow-hidden">
                  <a href="/player_rank"><img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{asset('storage/top/' . "team_player_rank_bn.jpg")}}" alt="player_rank"></a>
              </div>
            </div>

            <div class="p-4 md:w-1/3">
              <div class="rounded-lg overflow-hidden">
                  <a href="/schedule_list"><img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{asset('storage/top/' . "schedule_bn.jpg")}}" alt="schedule"></a>
              </div>
            </div>

          </div>
        </div>
      </section>








    </div>

  </div>
</x-front.app>
