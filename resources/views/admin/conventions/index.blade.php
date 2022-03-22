<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            大会一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font">
                      <div class="container md:px-5 mx-auto">

                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                          <x-flash-message status="session('status')" />
                          <div class="flex justify-end my-2 mr-2">
                            <button onclick="location.href='{{ route('admin.conventions.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded-md text-lg">新規登録する</button>    
                          </div>
                          <table class="table-auto w-full text-center whitespace-no-wrap">
                            <thead>
                              <tr>
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">大会名</th>
                                {{-- <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th> --}}
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($conventions as $convention)
                              <tr>
                                <td class="md:px-6 py-3">{{ $convention->id }}</td>
                                <td class="md:px-6 py-3">{{ $convention->convention_no }}</td>
                                {{-- <td class="md:px-4 py-3">{{ $convention->created_at->diffForHumans() }}</td> --}}
                                <td class="md:px-3 py-3">
                                  <button onclick="location.href='{{ route('admin.conventions.edit', ['convention' => $convention->id ]) }}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded">編集</button>
                                </td>
                              <form id="delete_{{$convention->id}}" method="post" action="{{ route('admin.conventions.destroy', ['convention' => $convention->id]) }}">                 
                                @csrf
                                @method('delete')
                                <td class="md:px-3 py-3">
                                  <a href="#" data-id="{{ $convention->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">削除</a>
                                </td>
                              </form>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{-- {{ $owners->links() }} --}}
                        </div>
                      </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
      function deletePost(e) {
      'use strict';
      if (confirm('本当に削除してもいいですか?')) { document.getElementById('delete_' + e.dataset.id).submit(); }
      }
    </script>
</x-app-layout>
