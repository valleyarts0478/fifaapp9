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

            <x-flash-message status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />  
          </div>
          <!-- text - end -->
          
          <!-- form - start -->     
            <form method="post" action="{{ route('team_owner.recruitment_members.store') }}" class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
                @foreach($team_owners as $team_owner)
                @csrf          
            <div>
              <label for="team_name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">チーム名</label>
              <select name="team_owner_id" id="team_owner_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option value="{{ $team_owner->id }}" >
                    {{$team_owner->team_name}}
                </option>
              </select>             
            </div>
      
            <div>
              <label for="twitter" placeholder="半角英数字" class="inline-block text-gray-800 text-sm sm:text-base mb-2">連絡先:Twitter</label>
              <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  <a class="text-blue-500" target="_blank" href="https://twitter.com/{{$team_owner->twitter_add}}">{{$team_owner->twitter_add}}</a>
              </div>
            </div>
            @endforeach

            <div class="sm:col-span-2">
                <label for="address1" class="inline-block text-gray-800 text-sm sm:text-base mb-2">連絡先:PSID</label>
                <input type="text" name="address1" value="{{ old('address1') }}" placeholder="PSID" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
              </div>
      
            <div class="sm:col-span-2">
              <label for="activitytime1" class="inline-block text-gray-800 text-sm sm:text-base mb-2">活動日・時間</label>
              <input type="text" name="activitytime1" value="{{ old('activitytime1') }}" placeholder="全角16文字(例)月～金・22時～24時" class="w-full h-12 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>
      
            <div class="sm:col-span-2">
              <label for="voicechat" class="inline-block text-gray-800 text-sm sm:text-base mb-2">ボイチャの有無</label>
              <input type="text" name="voicechat" value="{{ old('voicechat') }}" placeholder="全角23文字(例)テキストでの会話ができれば無くてもOK" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>
      
            <div class="sm:col-span-2">
              <label for="comment" class="inline-block text-gray-800 text-sm sm:text-base mb-2">募集内容</label>
              <textarea name="comment" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">{{ old('comment') }}</textarea>
            </div>
      
            <button type="button" onclick="location.href='{{ route('team_owner.recruitment_members.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
          
        </form>
          <!-- form - end -->
        </div>
      </div>

</x-app-layout>