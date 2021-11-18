<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Services\TeamService;
use App\Http\Requests\UploadImageRequest;
use App\Models\Team_owner;
use App\Models\Team;



class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:team_owners');

        $this->middleware(function ($request, $next) {
            // dd($request->route()->parameter('team')); //文字列
            // dd(Auth::id()); //数字
            $id = $request->route()->parameter('team'); //teamのid取得

            if (!is_null($id)) { // null判定
                $teamOwnerId = Team::findOrFail($id)->team_owner->id;
                $teamId = (int)$teamOwnerId; // キャスト 文字列→数値に型変換
                $teamownerId = Auth::id();
                if ($teamId !== $teamownerId) { // 同じでなかったら
                    abort(404); // 404画面表示 }
                }
            }
            return $next($request);
        });
    }

    public function index()
    {

        // $teamOwnerId = Auth::id();

        $teams = Team::where('team_owner_id', Auth::id())->get();
        // dd($teamOwnerId); //OK
        return view('team_owner.teams.index', compact('teams'));
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
        //
    }
}
