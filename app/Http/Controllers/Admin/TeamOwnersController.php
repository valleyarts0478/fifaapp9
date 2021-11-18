<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team_owner; //Eloquet エロクアント
use Illuminate\Support\Facades\DB; //QueryBuilder クエリビルダー
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Throwable;
use Illuminate\Support\Facades\Log;

class TeamOwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team_owners = Team_owner::select('id', 'name', 'email', 'created_at')
            ->paginate(10);

        return view('admin.team_owners.index', compact('team_owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Team_owner::findOrFail($id)->delete(); //ソフトデリート

        return redirect()
            ->route('admin.team_owners.index')
            ->with([
                'message' => 'チームオーナー情報を削除しました。',
                'status' => 'alert'
            ]);
    }

    public function expiredTeamOwnerIndex()
    {
        $expiredTeamOwners = Team_owner::onlyTrashed()->get();

        return view('admin.expired-team_owners', compact('expiredTeamOwners'));
    }

    public function expiredTeamOwnerDestroy($id)
    {
        Team_owner::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.expired-team_owners.index');
    }
}
