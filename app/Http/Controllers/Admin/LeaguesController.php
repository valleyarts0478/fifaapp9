<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\League; //Eloquet エロクアント
use App\Models\Convention; //Eloquet エロクアント
use App\Rules\alpha_num_check;

class LeaguesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // 主->　従
        // $conventions = Convention::all();
        // 主　<-従
        $leagues = League::all();
        // dd($conventions, $leagues);


        return view('admin.leagues.index', compact('leagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.leagues.create');
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
            'league_name' => ['required', 'string', new alpha_num_check], //書き方注意
        ]);

        League::create([
            'league_name' => $request->league_name,
        ]);

        return redirect()->route('admin.leagues.index')
            ->with([
                'message' => 'リーグ名を登録しました。',
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
        $league = League::findOrFail($id);

        return view('admin.leagues.edit', compact('league'));
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
            'league_name' => ['required', 'string', new alpha_num_check], //書き方注意
        ]);

        $league = League::findOrFail($id);
        $league->league_name = $request->league_name;
        $league->save();

        return redirect()
            ->route('admin.leagues.index')
            ->with([
                'message' => 'リーグ名を更新しました。',
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
        $convention = League::findOrFail($id)->delete();

        return redirect()
            ->route('admin.leagues.index')
            ->with([
                'message' => 'リーグ名を削除しました。',
                'status' => 'alert'
            ]);
    }
}
