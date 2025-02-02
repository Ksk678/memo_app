<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Http\Requests\MemoRequest;
use Illuminate\Support\Facades\Redis;

class MemoController extends Controller
{
    //全件取得
    public function index()
    {
        $memos = Memo::all();
        return view("memos.index", ["memos" => $memos]);
    }

    public function create()
    {
        return view("memos.create");
    }

    public function store(MemoRequest $request)
    {
        //インスタンスの作成
        $memo = new Memo();

        //値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        //インスタンスに値を設定して保存
        $memo->save();

        //登録したらindexに戻る
        return redirect(route("memos.index"));
    }
    // showページへ移動
    public function show($id)
    {
        $memo = Memo::find($id);
        return view("memos.show", ["memo" => $memo]);
    }

    public function edit($id)
    {
        $memo = Memo::find($id);
        return view("memos.edit", ["memo" => $memo]);
    }

    public function update(MemoRequest $request, $id)
    {
        // 更新対象データの取得
        $memo = Memo::find($id);

        //値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        //インスタンスに値を設定して保存
        $memo->save();

        //更新したらindexに戻る
        return redirect(route("memos.index"));
    }

    public function destroy($id)
    {
        $memo = memo::find($id);
        $memo->delete();

        return redirect(route ("memos.index"));
    }
}
