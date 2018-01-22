<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function SetTask(){

    }
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    protected function create(array $data)
    {
        return Task::create([
            'title' => $data['name'],
            'discription' =>'required
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }*/
}
