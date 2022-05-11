<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TeamMember;
use App\Models\Player;
use App\Models\Team_owner;

class TeamMembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:team_owners');

        $this->middleware(function ($request, $next) {
            // dd($request->route()->parameter('team_owner')); //文字列
            // dd(Auth::id()); //数字
            $id = $request->route()->parameter('team_owner'); //teamのid取得

            if (!is_null($id)) { // null判定
                $teamOwnerId = Team::findOrFail($id)->team_owner->id;
                $teamId = (int)$teamOwnerId; // キャスト 文字列→数値に型変換
                $teamownerId = Auth::id();
                if ($teamId !== $teamownerId) { // 同じでなかったら
                    abort(404); // 404画面表示 }
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        $teamId = Auth::id();
        // $team_owner = Team_owner::where('id', $teamId)->get();
        $team_member = TeamMember::where('team_owner_id', $teamId)->get();

        $count = TeamMember::where('team_owner_id', Auth::id())->count();
        // dd($count);

        return view('team_owner.recruitment_members.index', compact('team_member', 'count'));
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

        return view('team_owner.recruitment_members.create', compact('team_owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team_member = TeamMember::where('team_owner_id', Auth::id())->get();

        $team_member = new TeamMember();
        $team_member->team_owner_id = $request->team_owner_id;
        $team_member->address1 = $request->address1;
        $team_member->activitytime1 = $request->activitytime1;
        $team_member->voicechat = $request->voicechat;
        $team_member->comment = $request->comment;
        $team_member->save();

        return redirect()
            ->route('team_owner.recruitment_members.index')
            ->with([
                'message' => 'メンバー募集を作成しました。',
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
        $team_member = TeamMember::findOrFail($id);

        return view('team_owner.recruitment_members.edit', compact('team_member'));
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
        $team_member = TeamMember::findOrFail($id);

        $team_member->team_owner_id = $request->team_owner_id;
        $team_member->address1 = $request->address1;
        $team_member->activitytime1 = $request->activitytime1;
        $team_member->voicechat = $request->voicechat;
        $team_member->comment = $request->comment;
        $team_member->save();

        return redirect()
            ->route('team_owner.recruitment_members.index')
            ->with([
                'message' => 'メンバー募集を更新しました。',
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
        $team_member = TeamMember::findOrFail($id)->delete();


        return redirect()
            ->route('team_owner.recruitment_members.index')
            ->with([
                'message' => '選手を削除しました。',
                'status' => 'alert'
            ]);
    }
}
