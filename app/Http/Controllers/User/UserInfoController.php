<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Infomation;

class UserInfoController extends Controller
{
    public function index()
    {
        $infolist = Infomation::select('title', 'created_at')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('user.welcome', compact('infolist'));
    }
    public function infolist()
    {
        $infolist = Infomation::select('title', 'post', 'created_at')->orderBy('created_at', 'desc')->paginate(10);
        // dd($infolist);
        return view('user.infolist', compact('infolist'));
    }
}
