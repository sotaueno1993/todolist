<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Http\Requests\TodolistRequest;

class TodolistController extends Controller
{
    /**
     * Todoリスト一覧を表示する
     * 
     * @return view
     */

    public function showList()
    {
        $todolists = Todolist::all();

        return view('todolist.list', ['todolists' => $todolists]);
    }
    
    /**
     * Todoリスト詳細を表示する
     * @param int $id
     * @return view
     */

    public function showDetail($id)
    {
        $todolist = Todolist::find($id);

        if (is_null($todolist)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todolists'));
        }

        return view('todolist.detail', ['todolist' => $todolist]);
    }

    /**
     * Todo登録画面を表示する
     * 
     * @return view
     */

    public function showCreate() {
        return view('todolist.form');
    }

    /**
     * Todoを登録する
     * 
     * @return view
     */

    public function exeStore(TodolistRequest $request) {
        //TODOのデータを受け取る
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try{
            //TODOを登録
            Todolist::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'TODOを登録しました');
        return redirect(route('todolists'));
    }

    /**
     * Todo編集フォームを表示する
     * @param int $id
     * @return view
     */

    public function showEdit($id)
    {
        $todolist = Todolist::find($id);

        if (is_null($todolist)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todolists'));
        }

        return view('todolist.edit', ['todolist' => $todolist]);
    }

    /**
     * Todoを更新する
     * 
     * @return view
     */

    public function exeUpdate(TodolistRequest $request) {
        //TODOのデータを受け取る
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try{
            //TODOを更新
            $todolist = Todolist::find($inputs['id']);
            $todolist->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
            ]);
            $todolist->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'TODOを更新しました');
        return redirect(route('todolists'));
    }

    /**
     * Todo削除
     * @param int $id
     * @return view
     */

    public function exeDelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todolists'));
        }

        try{
            //Todoを削除
            Todolist::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('todolists'));
    }


}
