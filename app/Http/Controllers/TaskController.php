<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::where([user_id => Auth::user()->id])-get();
        return response()->json([
            'tasks' => $tasks
        ],200);
    }

    public function store (Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        $task = Task::create([
         //   'title' => $request('title'),
        //    'description' => $request('description'),
            'user_id' =>Auth::user()->id
        ]);
        return response()->json([
            'task' => $task,
            'message' => 'Success'
        ], 200);
    }
}
