<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Task;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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
    public function create(Request $request)
    {
       dd($request->all());
       print_r($request->all());
        if(Auth::check()){
            $this->validate($request, [
                // Auth::user()=>'required',
                'title'=> 'required|max:255',
                'description' => 'required|max:255',
                'email_us' => 'required|max:255',
                'dateTime' => 'required'

            ]);
         //  var_dump($request);
            $request->user()->tasks()->create([
                'title' => $request->title,
                'description' => $request->description,
                'email_us' => $request->email_us,
                'dateTime' => $request->time,
            ]);
            return back();
        }
        return redirect('/home');
    }

    public function delete(Request $request)
    {
        dd($request->all());
      if(Auth::check()){
          $task = Task::Find($request->id());
          $task -> delete();
              return view('/tasks');
          }
          return response('Error! ');

    }
    public function returnMyTasks(){

        if (Auth::check()){
            $user_id = Auth::id();
            $data =Task::where('user_id', $user_id)
               ->get()->toArray();
            return view('tasks',['data'=>$data]);
        }
        return "Error, ";
    }
    public function returnAllTasks(){
        if(Auth::check()){
            $user_id = Auth::id();
            $dataAll = Task::all()->toArray();
            $users = User::all()->toArray();
            return view('home', ['dataAll'=> $dataAll, 'users'=> $users]);
        }
    }
}
