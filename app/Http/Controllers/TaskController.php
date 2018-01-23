<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailer;
use App\Task;

class TaskController extends Controller
{
    protected $tasks;
    public function __construct(){

       $this->middleware('auth');
      // $this->tasks = $tasks;
    }

    public function index(Request $request){
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function indexMyTasks(Request $request)
    {
        return view('tasks.myTasks', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }
    public function store(Request $request)
    {
        if(Auth::check()){
            $this->validate($request, [
                'title'=> 'required|max:255',
                'description' => 'required|max:255',
                'email_us' => 'required',
                'dateTime' => 'required'
            ]);

            $request->user()->tasks()->create([
                'title' => $request->title,
                'description' => $request->description,
                'email_us' => $request->email_us,
                'dateTime' => $request->time,
            ]);
            return redirect('/tasks');
        }
        return redirect('/home');
    }
    public function destroy(Request $request, Task $task)
    {
      // $this->authorize('destroy', $tasks);
      //  $task->delete();
        $task->delete();
        return redirect('/tasks');
    }
}
