<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

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
}
