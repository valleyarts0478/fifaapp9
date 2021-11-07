<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convention; //Eloquet エロクアント
use App\Rules\alpha_num_check;

class ConventionsController extends Controller
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
        // dd('test2');
        $conventions = Convention::all();

        return view('admin.conventions.index', compact('conventions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conventions.create');
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
            'convention_no' => ['required', 'string', new alpha_num_check], //書き方注意
        ]);

        Convention::create([
            'convention_no' => $request->convention_no,
        ]);

        return redirect()->route('admin.conventions.index')
            ->with([
                'message' => '大会名を登録しました。',
                'status' => 'info'
            ]);;
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
        $convention = Convention::findOrFail($id);

        return view('admin.conventions.edit', compact('convention'));
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
        $convention = Convention::findOrFail($id);
        $convention->convention_no = $request->convention_no;
        $convention->save();

        return redirect()
            ->route('admin.conventions.index')
            ->with([
                'message' => '大会名を更新しました。',
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
        $convention = Convention::findOrFail($id)->delete(); //ソフトデリート

        return redirect()
            ->route('admin.conventions.index')
            ->with([
                'message' => '大会名を削除しました。',
                'status' => 'alert'
            ]);
    }

    public function expiredConventionIndex()
    {

        $expiredConventions = Convention::onlyTrashed()->get();

        return view('admin.expired-conventions', compact('expiredConventions'));
    }

    public function expiredConventionDestroy($id)
    {

        Convention::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('admin.expired-conventions.index');
    }
}
