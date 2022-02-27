<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           対戦表CSV登録
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
      <div class="container text-center px-5 py-24 mx-auto">
        <div class="upload">
          <p>DBに追加したいCSVデータを選択してください。</p>
          <form action="/admin/import/csv/upload/" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csvdata" />
            <button class="p-2 rounded-md border border-gray-600">送信</button>
          </form>
        </div>
      
        <div class="contents">
          <p class="mb-4">{{$cnt}}件登録しました。</p>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">id</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">大会名</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">リーグ</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">game_date</th>
                <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">HOME</th>
                <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">AWAY</th>
                <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">更新日</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $val)
              <tr>
                <td class="border px-4">{{ $val->id }}</td>
                <td class="border px-4">{{ $val->convention_id }}</td>
                <td class="border px-4">{{ $val->league_id }}</td>
                <td class="border px-4">{{ $val->game_date }}</td>
                <td class="border px-4">{{ $val->home_team }}</td>
                <td class="border px-4">{{ $val->away_team }}</td>
                <td class="border px-4 text-xs">{{ $val->updated_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
      </div>
    </section>

</x-app-layout>