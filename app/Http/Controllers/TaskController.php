<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

      public function index()
    {
        return view('tasks');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'discription' =>'requered|max:255',
            'email' => 'required|email|max:255',
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title,
            'discription' => $request->discription,
            'email' => $request->email,
        ]);

        return redirect('/tasks');
    }
}
