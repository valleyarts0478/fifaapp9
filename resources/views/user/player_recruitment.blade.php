<x-front.app>
    

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">FIFA プロクラブメンバー募集</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">RAL-Eリーグに参戦しているチームに入団したいかたのメンバー募集ページです。入団希望のかたはTwitterからDMを送ってください。</p>
      </div>
      <div class="flex flex-wrap -m-4">
        @foreach($team_members as $team_member)
        <div class="mx-auto border-b border-dashed border-gray-500 p-4 lg:w-1/2">
          <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
            <img class="flex-shrink-0 rounded-lg w-36 h-36 object-cover object-center sm:mb-0 mb-4" src="{{ asset('storage/teams/logo/' . $team_member->team_owner->team_logo_url) }}" loading="lazy" alt="team_logo">
            {{-- <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="https://dummyimage.com/200x200"> --}}
            <div class="flex-grow sm:pl-8">
              <h2 class="title-font font-medium text-lg text-gray-900">{{$team_member->team_owner->team_name}}</h2>
              
              <h3 class="text-gray-500 mb-3">活動日時:{{$team_member->activitytime1}}</h3>
              {{-- <p class="mb-4">{{$team_member->activitytime1}}</p> --}}
              <span class="inline-flex">
                <a class="" href="https://twitter.com/{{$team_member->team_owner->twitter_add}}"><svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg></a>
                <a class="ml-2 text-gray-500">
                  <i class="fa-solid fa-gamepad"></i>PSID:{{$team_member->address1}}
                  </a>
              </span>
            </div>
            <div>
              <button onclick="location.href='{{ route('user.player_recruitment.show', ['player_recruitment' => $team_member->id ]) }}'" class="text-white bg-ral-400 border-0 py-2 px-8 focus:outline-none rounded-md text-sm">募集内容をみる</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>








</x-front.app>