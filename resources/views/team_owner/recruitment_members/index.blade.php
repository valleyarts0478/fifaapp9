<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>  

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
          <!-- text - start -->
          <div class="mb-10 md:mb-16">
            <h1 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">FIFA プロクラブメンバー募集</h1>
      
            <p class="max-w-screen-md text-gray-500 md:text-lg text-center mx-auto">RAL-Eリーグに参戦しているチームに入団したいかた向けのメンバー募集ページです。</p>
          </div>
          <!-- text - end -->
          <x-flash-message status="session('status')" />
          <!-- レコードが０の場合 - start -->
          @if($count === 0)
          <div class="text-center my-2 mr-2">
            <button onclick="location.href='{{ route('team_owner.recruitment_members.create') }}'" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-ral-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-ral-300">新規作成</button>    
          </div>
          @endif
          <!-- レコードが０の場合 - END -->
          <div class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
          <!-- form - start -->     
            @foreach($team_member as $member)
                
            <div>
              <label for="team_name" class="inline-block text-gray-800 font-bold text-sm sm:text-base mb-2">チーム名</label>
                <div class="w-full text-gray-800 px-3 py-2">{{$member->team_owner->team_name}}</div>
            </div>
      
            <div>
              <label for="twitter" placeholder="半角英数字" class="inline-block text-gray-800 font-bold text-sm sm:text-base mb-2">連絡先:Twitter</label>
              <div class="w-full text-gray-800 px-3 py-2">
                  <a class="text-blue-500" href="https://twitter.com/{{$member->team_owner->twitter_add}}">{{$member->team_owner->twitter_add}}</a>
              </div>
            </div>

            <div class="sm:col-span-2">
                <label for="address1" class="inline-block text-gray-800 font-bold text-sm sm:text-base mb-2">連絡先:PSIDなど</label>
                <div class="text-gray-800 text-sm sm:text-base mb-2">{{$member->address1}}</div>
              </div>
      
            <div class="sm:col-span-2">
              <label for="activitytime1" class="inline-block text-gray-800 font-bold text-sm sm:text-base mb-2">活動日・時間</label>
              <div class="text-gray-800 text-sm sm:text-base mb-2">{{$member->activitytime1}}</div>
            </div>
      
            <div class="sm:col-span-2">
              <label for="voicechat" class="inline-block text-gray-800 font-bold text-sm sm:text-base mb-2">ボイチャの有無</label>
              <div class="text-gray-800 text-sm sm:text-base mb-2">{{$member->voicechat}}</div>
            </div>
      
            <div class="sm:col-span-2">
              <label for="comment" class="inline-block text-gray-800 font-bold text-sm sm:text-base mb-2">募集内容</label>
              <div class="border h-64 bg-gray-50 text-gray-800 text-sm sm:text-base mb-2">{!! nl2br(e($member->comment)) !!}</div>
              {{-- <textarea name="comment" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2"></textarea> --}}
            </div>
      
            <div class="sm:col-span-2 flex justify-between items-center">
                <button onclick="location.href='{{ route('team_owner.recruitment_members.edit', ['recruitment_member' => $member->id ]) }}'" class="text-white bg-ral-400 border-0 py-2 px-8 focus:outline-none rounded-md text-sm">編集</button>                     
            </div>
        
          @endforeach
          </div>
        </div>
      </div>




</x-app-layout>