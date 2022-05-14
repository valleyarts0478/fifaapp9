<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Convention;
use App\Models\Goal_Assist;

class GameCheckController extends Controller
{
    public function index()
    {
        $convention = Convention::orderBy('id', 'desc')->first();

        //リレーション先での絞り込み検索
        $goal_assists = Goal_Assist::wherehas('game_result', function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->select('game_result_id')
            ->selectRaw('SUM(goals) AS total_goal')
            ->groupBy('game_result_id')
            ->paginate(12);

        // dd($goal_assists);
        return view('admin.game_check.index', compact('goal_assists'));
    }
}
