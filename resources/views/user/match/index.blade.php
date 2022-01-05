<x-front.app>
      {{-- @foreach ($homes as $home)
         
        @foreach ($home->aways as $away)
        {{$home->home_name}}{{ $away->pivot->away_team }}  <br>
        @endforeach
      @endforeach --}}
    <x-slot name="header">
      @include('layouts.f_header')
    </x-slot>
    <x-flash-message status="session('status')" />

    <section class="text-gray-600 body-font">

      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-2">
          @foreach ($homes as $home)
          @foreach ($home->aways as $away)
          <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
              <div class="w-16 h-full mr-2 text-xs bg-gray-100">
               <span class="block"> {{ substr($away->pivot->game_date, 0, 4) }}</span>
               <span class="block"> {{ substr($away->pivot->game_date, 5, 2) }}</span>
               <span class=""> {{ substr($away->pivot->game_date, 8, 2) }}</span>
              </div>
              <div> 
               <div class="flex items-center">
                 <img alt="team" class="w-6 h-6 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                 <h2 class="text-sm text-gray-900 title-font font-medium">{{$home->home_name}}</h2>
               </div>

                <div class="relative w-4 ml-1 text-xs">VS</div>

               <div class="flex items-center">
                 <img alt="team" class="w-6 h-6 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                 <h2 class="text-sm text-gray-900 title-font font-medium">{{ $away->pivot->away_team }}</h2>
               </div>
              </div> 
            </div>
          </div>
          @endforeach
          @endforeach
        </div>
      </div>

    </section>
</x-front.app>

