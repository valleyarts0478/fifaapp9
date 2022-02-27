<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team_owner;
use App\Http\Requests\PlayerRequest;
use App\Rules\Player_no_check;
use App\Rules\alpha_num_check;


class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:team_owners');

        // $this->middleware(function ($request, $next) {

        //     $id = $request->route()->parameter('player'); //shopのid取得

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

        $teamId = Auth::id();
        $team_owners = Team_owner::where('id', $teamId)->get();

        $players = Player::where('team_owner_id', Auth::id())
            ->select('id', 'team_owner_id', 'position_id', 'player_no', 'player_name')
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($players);
        $count = Player::where('team_owner_id', Auth::id())->count();


        return view('team_owner.players.index', compact('team_owners', 'players', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teamId = Auth::id();
        $team_owners = Team_owner::where('id', $teamId)->get();

        $players = Player::where('team_owner_id', Auth::id())
            ->select('id', 'team_owner_id', 'position_id', 'player_no', 'player_name')
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($players);
        return view('team_owner.players.create', compact('team_owners', 'players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_owner_id' => 'required',
            'position_id' => 'required',
            'player_no' => [new Player_no_check, new alpha_num_check],
            'player_name' => ['required', 'unique:players', 'string', 'max:50', new alpha_num_check],

        ]);

        $player = new Player();
        $player->team_owner_id = Auth::id();
        $player->position_id = $request->position_id;
        $player->player_no = $request->player_no;
        $player->player_name = $request->player_name;
        $player->save();
        // dd($player);
        return redirect()
            ->route('team_owner.players.index')
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
        $player = Player::findOrFail($id);
        // dd($player->position_id);
        $positions = Position::all();

        // foreach ($players as $player) {
        //     $test[] = $player->position->position_name;
        // }
        // dump($test);
        // dd($test);

        // dd($player);
        return view('team_owner.players.edit', compact('player', 'positions', 'player'));
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
        $request->validate([
            'team_owner_id' => 'integer|max:25',
            'position_id' => 'string|max:3',
            'player_no' => 'required|integer|max:100',
            'player_name' => 'required|string|max:50',
        ]);

        $player = Player::findOrFail($id);
        $player->team_owner_id = $request->team_owner_id;
        $player->position_id = $request->position_id;
        $player->player_no = $request->player_no;
        $player->player_name = $request->player_name;
        $player->save();

        return redirect()
            ->route('team_owner.players.index')
            ->with([
                'message' => '選手を更新しました。',
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
        Player::findOrFail($id)->delete();

        return redirect()
            ->route('team_owner.players.index')
            ->with([
                'message' => '選手を削除しました。',
                'status' => 'alert'
            ]);
    }
}
