<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http;
use App\User;
use App\Task;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\JwtGuard;
use Illuminate\Mail\Mailer;


class TaskController extends Controller
{
    protected $tasks;
    public function __construct(){

       $this->middleware('auth');
      // $this->tasks = $tasks;
    }


    public function create(Request $request)
    {
        //dd(Auth::user()->);
        if(Auth::check()){
            $input = $request->only([
               'title',
               'description',
               'dateTime',
               'email_us',

            ]);
           // dd($input);
            //dd(Auth::user());
            $task = new Task;
            $task -> user_email = Auth::user()->email;
            $task -> user_id = Auth::id();
            $task -> title = $input['title'];
            $task -> description = $input['description'];
            $task -> time = $input['dateTime'];
            $task -> email_us = $input['email_us'];
            $task ->save();
            return back();
        }
        return "Error....";
    }

   /* public function mail(Request $request, Mailer $mailer  )
    {
        $mailer
            ->to($request->input('receiver'))
            ->send(new \App\Mail\notification($request->input('name')));
        return redirect()->back();
    }*/

    public function delete(Request $request)
    {

      if(Auth::check()){
          $id = $request->id;
          $task = Task::Find($id);
          if($task != null) {
              $task->delete();
              return back();
          }
          return response('Error! ');
          }


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
        return "Error....";
    }
}
