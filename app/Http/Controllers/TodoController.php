<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use PDO;

class TodoController extends Controller
{
    //一覧画面を表示
    public function index(){
        $todos = Todo::all();
        return view('todo.index',compact('todos'));
    }
    
    //投稿画面を表示
    public function create(){
        return view('todo.create');
    }

    //メッセージの返却
    public function store(Request $request){
        // インスタンス作成。
        $todo = new Todo();
        // titleカラムにrequestのtitleを保存。
        $todo->title = $request -> input('title');
        //変数を保存。
        $todo->save();

        return redirect('todos')->with(
            'status',
            $todo->title . 'を登録しました。'
        );
    }

    //詳細画面の返却
    public function show($id){
        $todo = Todo::findOrFail($id);
        return view('todo.show',compact('todo'));
    }

    //編集画面の返却
    public function edit($id){
        $todo = Todo::findOrFail($id);
        return view('todo.edit',compact('todo'));
    }
}
