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


        $players = Player::all()->where('team_owner_id', Auth::id());
        return view('team_owner.games.create', compact('players'));
    }

    public function store(Request $request)
    {
        $game = Game::create($request->id);
        dd($game);
        // $game = new Game();
        // 'player_id' => $request->player_id;

        return view('team_owner.games.index');
    }


    public function edit($id)
    {
        $team_owner = Team_owner::findOrFail(Auth::id());
        $game = Game::findOrFail($id);
        // dd($game->players->player_name);
        $players = Player::all()->where('team_owner_id', Auth::id());
        // dd($players);


        // foreach ($game->players as $player) {
        //     $goal = $player->pivot->goal;
        // }
        // dd($goal);
        //goalまでとれる


        return view('team_owner.games.edit', compact('game', 'players', 'team_owner'));
    }

    public function update(Request $request, $id)
    {
        $team_owner = Team_owner::findOrFail(Auth::id());
        $game = Game::findOrFail($id);
        $players = Player::all()->where('team_owner_id', Auth::id());

        if ($team_owner->team_name === $game->home_team) {
            $players = Player::findOrFail($id);
            $game->p_name1 = $request->player_name;
            $game->p_name2 = $request->player_name2;
            $game->save();
        } else {
            return redirect('あなたはAWAYです。');
        }





        // $player = Player::findOrFail($id);
        // $game->p_name = $request->player_name;
        // $game->p_name2 = $request->player_name2;
        // $game->goal = $request->goal;
        // $game->save();
        // $game->players()->syncWithoutDetaching($request->player_id, $request->goal);

        // $game->players()->syncWithoutDetaching($request->goal); //とれない

        // $game->players()->attach($request->player_id);//OK
        // $player = Player::findOrFail($id);
        // $player->save();

        // $game->players()->attach(2); //player_idに2が登録できる

        return redirect()
            ->route('team_owner.games.index')
            ->with([
                'message' => 'スタッツ入力が完了しました。',
                'status' => 'info'
            ]);
    }
}
