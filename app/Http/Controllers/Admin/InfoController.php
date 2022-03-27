<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //QueryBuilder クエリビルダー
use App\Models\Infomation;

class InfoController extends Controller
{
    public function index()
    {

        $infos = Infomation::select('id', 'title', 'updated_at')
            ->OrderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.info.index', compact('infos'));
    }

    public function create()
    {
        return view('admin.info.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string'],
            'post' => ['required', 'string', 'max:1000'],
        ]);

        Infomation::create([
            'title' => $request->title,
            'post' => $request->post,
        ]);

        return redirect()->route('admin.info.index')
            ->with([
                'message' => 'お知らせを登録しました。',
                'status' => 'info'
            ]);
    }

    public function edit($id)
    {
        $info = Infomation::findOrFail($id);

        return view('admin.info.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => ['required', 'string'],
        //     'post' => ['required', 'string', 'max:1000'],
        // ]);

        $info = Infomation::findOrFail($id);
        $info->title = $request->title;
        $info->post = $request->post;
        $info->save();

        return redirect()->route('admin.info.index')
            ->with([
                'message' => 'お知らせを更新しました。',
                'status' => 'info'
            ]);
    }
}
