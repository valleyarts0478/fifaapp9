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
      
          <!-- form - start -->     
            <form method="post" action="{{ route('team_owner.recruitment_members.update', ['recruitment_member' => $team_member->id]) }}" class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">
                @csrf
                @method('put')
            <div>
              <label for="team_name" class="inline-block text-gray-800 text-sm sm:text-base mb-2">チーム名</label>
              <select name="team_owner_id" id="team_owner_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option value="{{ $team_member->team_owner->id }}" >
                    {{$team_member->team_owner->team_name}}
                </option>
              </select>
                {{-- <div class="w-full text-gray-800 px-3 py-2">{{$team_member->team_owner->team_name}}</div> --}}
              
            </div>
      
            <div>
              <label for="twitter" placeholder="半角英数字" class="inline-block text-gray-800 text-sm sm:text-base mb-2">連絡先:Twitter</label>
              <div class="w-full text-gray-800 px-3 py-2">
                  <a class="text-blue-500" href="https://twitter.com/{{$team_member->team_owner->twitter_add}}">{{$team_member->team_owner->twitter_add}}</a>
              </div>
            </div>

            <div class="sm:col-span-2">
                <label for="address1" class="inline-block text-gray-800 text-sm sm:text-base mb-2">連絡先:その他</label>
                <input type="text" name="address1" value="{{$team_member->address1}}" placeholder="PSIDなど" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
              </div>
      
            <div class="sm:col-span-2">
              <label for="activitytime1" class="inline-block text-gray-800 text-sm sm:text-base mb-2">活動日・時間</label>
              <input type="text" name="activitytime1" value="{{$team_member->activitytime1}}" placeholder="(例)月～金・22時～24時" class="w-full h-12 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>
      
            <div class="sm:col-span-2">
              <label for="voicechat" class="inline-block text-gray-800 text-sm sm:text-base mb-2">ボイチャの有無</label>
              <input type="text" name="voicechat" value="{{$team_member->voicechat}}" placeholder="(例)喋れると嬉しいですが無くてもOK" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
            </div>
      
            <div class="sm:col-span-2">
              <label for="comment" class="inline-block text-gray-800 text-sm sm:text-base mb-2">募集内容</label>
              <textarea name="comment" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2">{{$team_member->comment}}</textarea>
            </div>
      
            <button type="button" onclick="location.href='{{ route('team_owner.recruitment_members.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
            <button type="submit" class="text-white bg-ral-400 border-0 py-2 px-8 focus:outline-none rounded text-lg">更新</button>
          </form>
          <!-- form - end -->
          <form id="delete_{{$team_member->id}}" method="post" action="{{ route('team_owner.recruitment_members.destroy', ['recruitment_member' => $team_member->id ]) }}">                 
            @csrf
            @method('delete')
            <div class="p-2 w-full flex justify-around mt-8">
              <a href="#" data-id="{{ $team_member->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">削除する</a>
            </div>
          </form>
        </div>
        
      </div>

     

      <script>
        function deletePost(e) {
        'use strict';
        if (confirm('本当に削除してもいいですか?')) { document.getElementById('delete_' + e.dataset.id).submit(); }
        }
      </script>

</x-app-layout>