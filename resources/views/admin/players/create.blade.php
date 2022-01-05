<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">選手登録</h1>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <x-flash-message status="session('status')" />
          <form method="post" action="{{ route('admin.players.store') }}">
              @csrf
        <div class="-m-2">
          <div class="p-2 w-1/2 mx-auto">
            <div class="relative">
              <label for="team" class="leading-7 text-sm text-gray-600">チーム名</label>
                <select name="team" id="team" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  @foreach($team_owners as $team_owner)
                      <option value="{{ $team_owner->id }}" >
                      {{ $team_owner->team_name }}
                      </option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="p-2 w-1/2 mx-auto">
            <div class="relative">
              <label for="player_no" class="leading-7 text-sm text-gray-600">背番号</label>
              <input type="text" id="player_no" name="player_no" value="{{ old('player_no') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          <div class="p-2 w-1/2 mx-auto">
            <div class="relative">
              <label for="player_name" class="leading-7 text-sm text-gray-600">選手名</label>
              <input type="text" id="player_name" name="player_name" value="{{ old('player_name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
          </div>
          {{-- <x-team-logo :teamlogourl="$team->team_logo_url" /> --}}
          <div class="p-2 flex justify-around w-full mt-4">
            <button type="button" onclick="location.href='{{ route('admin.players.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
  
          </div>
        </div>
      </form>
      </div>
    </div>
  </section>
</x-app-layout>
