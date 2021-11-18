<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')" />
                   @foreach ($teams as $team )
                   <div class="w-1/2 p-4">
                     <a href="{{ route('team_owner.teams.edit', ['team' => $team->id]) }}">
                        <div class="border rounded-md p-4">
                        {{ $team->team_name }}
                            <x-team-logo :teamlogourl="$team->team_logo_url" />
                        </div>
                      </a>
                   </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
