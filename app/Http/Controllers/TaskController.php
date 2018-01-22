<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Controller;
use App\Task;

class TaskController extends Controller
{
    public function __construct(){

       $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            $this->validate($request, [
                'title'=> 'required|max:255',
                'description' => 'required|max:255',
                'email_us' => 'required|max:255',
            ]);

            $request->user()->tasks()->create([
                'title' => $request->title,
                'description' => $request->description,
                'email_us' => $request->email_us,
            ]);

        }
                return redirect('/tasks');
    }
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/tasks');
    }
}
