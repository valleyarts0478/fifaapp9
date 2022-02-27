<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use InterventionImage;
use App\Services\ImageService;
use App\Services\TeamService;
use App\Http\Requests\UploadImageRequest;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\League;
use App\Models\Convention;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:team_owners');

        // $this->middleware(function ($request, $next) {
        //     // dd($request->route()->parameter('team_owner')); //文字列
        //     // dd(Auth::id()); //数字
        //     $id = $request->route()->parameter('team_owner'); //teamのid取得

        //     if (!is_null($id)) { // null判定
        //         $teamOwnerId = Team::findOrFail($id)->team_owner->id;
        //         $teamId = (int)$teamOwnerId; // キャスト 文字列→数値に型変換
        //         $teamownerId = Auth::id();
        //         if ($teamId !== $teamownerId) { // 同じでなかったら
        //             abort(404); // 404画面表示 }
        //         }
        //     }
        //     return $next($request);
        // });
    }

    public function index()
    {

        $teamId = Auth::id();
        $team_owners = Team_owner::where('id', $teamId)->get();

        $league = League::select('id', 'league_name');

        $players = Player::select('team_owner_id', 'position_id', 'player_no', 'player_name')
            ->where('team_owner_id', Auth::id())
            ->orderBy('player_name', 'asc')->get();

        $count = Player::where('team_owner_id', Auth::id())->count();

        return view('team_owner.index', compact('team_owners', 'players', 'count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return view('team_owner.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImageRequest $request, $id)
    {

        $request->validate([
            'team_name' => 'required|string|max:25',
        ]);

        $imageFile = $request->team_logo_url; //一時保存
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = TeamService::logoupload($imageFile, 'teams');
        }

        $team = Team::findOrFail($id);
        $team->team_name = $request->team_name;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $team->team_logo_url = $fileNameToStore;
        }

        $team->save();

        return redirect()
            ->route('team_owner.teams.index')
            ->with([
                'message' => 'チーム情報を更新しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::findOrFail($id)->delete();

        return redirect()
            ->route('team_owner.teams.index')
            ->with([
                'message' => 'チームを削除しました。',
                'status' => 'alert'
            ]);
    }
}
