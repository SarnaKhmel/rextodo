<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Task;

class TaskController extends Controller
{
    public function __construct(){

       // protected $tasks;

        $this->middleware('auth');
    }

      public function index()
    {
        $tasks = Task::all();
        return view('tasks');
    }
    public function store(Request $request)
    {

        if(Auth::check()){
            $task = Task::create([
                'user_id'=>Auth::user()->id,
                'title' =>$request->input('title'),
                'description'=>$request->input('description'),
                'email_us'=>$request->input('email_us')
            ]);

            if($task){
                return redirect()->route('task.show',['task'=>$task->id])->with('success', 'Task created successfully');
            }
        }
        /*$this->validate($request, [
            'title' => 'required|max:255',
            'description' =>'required|max:255',
            'email_id' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'email_id' => $request->email_id,
        ]);

        return redirect('/tasks');*/
    }
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/tasks');
    }
}
