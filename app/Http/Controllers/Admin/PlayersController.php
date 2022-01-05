<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; //QueryBuilder クエリビルダー
use App\Models\Team_owner;
use App\Models\Player;
use App\Http\Requests\PlayerRequest;

class PlayersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        // $this->middleware(function ($request, $next) {

        //     $id = $request->route()->parameter('players'); //shopのid取得

        //     if (!is_null($id)) {
        //         $playerOwnerId = Player::findOrFail($id)->team->team_owner->id;
        //         $playerId = (int)$playerOwnerId; // キャスト 文字列→数値に型変換
        //         if ($playerId !== Auth::id()) {
        //             abort(404);
        //         }
        //     }
        //     return $next($request);
        // });
    }

    public function index()
    {
        $players = Player::select('team_owner_id', 'player_no', 'player_name')
            ->orderBy('team_owner_id', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::select('team_owner_id', 'player_no', 'player_name')
            ->get();

        $team_owners = Team_owner::select('id', 'team_name')->get();
        // dd($team_owners);

        return view('admin.players.create', compact('players', 'team_owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {

        $player = new Player();
        $player->team_owner_id = Auth::id();
        $player->player_no = $request->player_no;
        $player->player_name = $request->player_name;
        $player->save();

        return redirect()
            ->route('admin.players.index')
            ->with([
                'message' => '選手登録をしました。',
                'status' => 'info'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
