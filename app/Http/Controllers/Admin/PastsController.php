<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Convention;
use App\Models\League;
use App\Models\ConventionsResult;
use App\Models\PlayerRankTotal;
use App\Models\PastPlayerRankTotal;
use Artisan; //追加


class PastsController extends Controller
{
    public function pastmove()
    {
        Artisan::call('command:past');

        return redirect('/admin/dashboard')->with('success', '大会結果をコピーしました!');
    }
    public function past_player_move()
    {
        Artisan::call('command:pastplayer');

        return redirect('/admin/dashboard')->with('success', '得点・アシスト者をコピーしました!');
    }
    public function teammove()
    {
        Artisan::call('command:team');

        return redirect('/admin/dashboard')->with('success', 'チームをコピーしました!');
    }
    public function playermove()
    {
        Artisan::call('command:playermove');

        return redirect('/admin/dashboard')->with('success', '選手をコピーしました!');
    }
}
