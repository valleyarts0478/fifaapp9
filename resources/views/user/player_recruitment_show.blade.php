<x-front.app>
    

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6">
    <h1 class="text-lg leading-6 font-medium text-gray-900">FIFA プロクラブメンバー募集</h1>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">RAL-Eリーグに参戦しているチームに入団したいかた向けのメンバー募集ページです。</p>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500"></dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><img class="w-12 h-12 object-cover object-center" src="{{ asset('storage/teams/logo/' . $team_member->team_owner->team_logo_url) }}" loading="lazy" alt="team_logo"></dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">チーム名</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$team_member->team_owner->team_name}}</dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">活動日時</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$team_member->activitytime1}}</dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">ボイチャ</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$team_member->voicechat}}</dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">募集内容</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><p class="leading-relaxed text-base">{!! nl2br(e($team_member->comment)) !!}</p></dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">連絡先</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                <!-- Heroicon name: solid/paper-clip -->
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
                <span class="ml-2 flex-1 w-0 truncate"><a class="text-blue-500" href="https://twitter.com/{{$team_member->team_owner->twitter_add}}">{{$team_member->team_owner->twitter_add}}</a></span>
              </div>
            </li>
            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                <!-- Heroicon name: solid/paper-clip -->
                <i class="fa-solid fa-gamepad"></i>
                <span class="ml-2 flex-1 w-0 truncate">{{$team_member->address1}}(PSID)</span>
              </div>
            </li>
          </ul>
        </dd>
      </div>
    </dl>
  </div>
</div>

</x-front.app>