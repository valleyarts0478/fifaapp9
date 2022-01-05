<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Home;
use App\Models\Away;

class MatchController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        // foreach ($home->aways as $away) {
        //     echo $away->pivot->away_team;
        // }

        return view('user.match.index', compact('homes'));
    }
}
