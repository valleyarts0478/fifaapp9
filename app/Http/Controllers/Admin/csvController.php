<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Storage;
use App\Models\Game;
use App\Models\GameResult;

class csvController extends Controller
{
    // 一覧表示処理
    public function index(Request $request)
    {

        $data = DB::table('games')->get(); // データ登録対象のテーブルからデータを取得する
        $count = $request->input('count'); // 何件登録したか結果を返す

        return view('admin.import.csv.index', ['data' => $data, 'cnt' => $count]);
    }

    // CSVアップロード〜DBインポート処理
    public function upload(Request $request)
    {
        // 一旦アップロードされたCSVファイルを受け取り保存する
        $uploaded_file = $request->file('csvdata'); // inputのnameはcsvdataとする 
        $orgName = date('Y_m_d') . "_" . $request->file('csvdata')->getClientOriginalName();
        $spath = storage_path('app/');
        $path = $spath . $request->file('csvdata')->storeAs('', $orgName);

        // CSVファイル（エクセルファイルも可）を読み込む
        //$result = (new FastExcel)->importSheets($path); //エクセルファイルをアップロードする時はこちら
        $result = (new FastExcel)->configureCsv(',')->importSheets($path); // カンマ区切りのCSVファイル時

        // DB登録処理
        $count = 0; // 登録件数確認用
        foreach ($result as $row) {
            foreach ($row as $item) {
                // ここでCSV内データとテーブルのカラムを紐付ける（左側カラム名、右側CSV１行目の項目名）
                $param = [
                    'convention_id' => $item["convention_id"],
                    'league_id' => $item["league_id"],
                    'game_date' => $item["game_date"],
                    'home_team' => $item["home_team"],
                    'away_team' => $item["away_team"],
                ];

                // 次にDBにinsertする（更新フラグなどに対応するため１行ずつinsertする）
                // DB::table('games')->insert($param);
                // $count++;

                $game = Game::create($param);

                $game_result = GameResult::create([
                    'game_id' => $game->id,
                    'convention_id' => $game->convention_id,
                    'league_id' => $game->league_id,

                ]);
                $count++;
            }
        }


        return redirect(route('admin.import.csv', ['count' => $count]));
    }
}
