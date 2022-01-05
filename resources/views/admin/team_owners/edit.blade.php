<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            チームオーナー編集画面
        </h2>
    </x-slot>

<section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">チームオーナー編集</h1>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <x-flash-message status="session('status')" />
        <form method="post" action="{{ route('admin.team_owners.update', ['team_owner' => $team_owner->id ]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
      <div class="-m-2">
        <div class="p-2 w-1/2 mx-auto">
          <div class="relative">
            <label for="convention_id" class="leading-7 text-sm text-gray-600">大会名</label>
              <select name="convention_id" id="convention_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @foreach($conventions as $convention)    
                    <option value="{{ $convention->id }}" @if($convention->id === $team_owner->convention->id ) selected @endif>
                    {{ $convention->convention_no }}
                    </option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="p-2 w-1/2 mx-auto">
          <div class="relative">
            <label for="league_id" class="leading-7 text-sm text-gray-600">リーグ名</label>
              <select name="league_id" id="league_id" value="{{ $team_owner->league->league_name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                @foreach($leagues as $league)    
                    <option value="{{ $league->id}}" @if($league->id === $team_owner->league->id) selected @endif>
                    {{ $league->league_name }}
                    </option>
                @endforeach
              </select>
          </div>
        </div>
        <div class="p-2 w-1/2 mx-auto">
          <div class="relative">
            <label for="team_name" class="leading-7 text-sm text-gray-600">チーム名</label>
            <input type="text" id="team_name" name="team_name" value="{{ $team_owner->team_name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2 mx-auto">
          <div class="relative">
            <label for="team_abb" class="leading-7 text-sm text-gray-600">チーム略称</label>
            <input type="text" id="team_abb" name="team_abb" value="{{ $team_owner->team_abb }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2 mx-auto">
          <x-thumbnail :filename="$team_owner->team_logo_url" type="teams" />
        </div>
        <div class="p-2 w-1/2 mx-auto">
            <div class="relative">
              <label for="team_logo_url" class="leading-7 text-sm text-gray-600">チームLogo</label>
              <input type="file" id="team_logo_url" name="team_logo_url" accept="image/png,image/jpeg,image/jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          {{-- <div class="p-2 w-1/2 mx-auto">
            <div class="relative">
              <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
              <input type="password" id="password" name="password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <div class="p-2 w-1/2 mx-auto">
            <div class="relative">
              <label for="password_confirmation" class="leading-7 text-sm text-gray-600">パスワード確認</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div> --}}
        <div class="p-2 flex justify-around w-full mt-4">
          <button type="button" onclick="location.href='{{ route('admin.team_owners.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
          <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</section>
</x-app-layout>
