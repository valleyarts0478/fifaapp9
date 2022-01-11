<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Team_owner;
use App\Models\Player;


class GamesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:team_owners');
    }

    public function index()
    {
        $team_owner = Team_owner::find(Auth::id());
        // dd($team_owner->team_name);

        $games = Game::select('id', 'convention_id', 'league_id', 'game_date', 'home_team', 'away_team')
            ->where('home_team', $team_owner->team_name)
            ->orWhere('away_team', $team_owner->team_name)
            ->orderBy('game_date', 'asc')
            ->get();

        return view('team_owner.games.index', compact('games', 'team_owner'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function edit($id)
    {
        // $team_owner = Team_owner::findOrFail(Auth::id());
        // $game = Game::findOrFail($id);
        // // dd($game->players->player_name);
        // $players = Player::all()->where('team_owner_id', Auth::id());


        // return view('team_owner.games.edit', compact('game', 'players', 'team_owner'));
    }

    public function update(Request $request, $id)
    {
        // $team_owner = Team_owner::findOrFail(Auth::id());
        // $game = Game::findOrFail($id);
        // $players = Player::all()->where('team_owner_id', Auth::id());

        // if ($team_owner->team_name === $game->home_team) {
        //     $players = Player::findOrFail($id);
        //     $game->p_name1 = $request->player_name;
        //     $game->p_name2 = $request->player_name2;
        //     $game->save();
        // } else {
        //     return redirect('あなたはAWAYです。');
        // }


        // return redirect()
        //     ->route('team_owner.games.index')
        //     ->with([
        //         'message' => 'スタッツ入力が完了しました。',
        //         'status' => 'info'
        //     ]);
    }
}
