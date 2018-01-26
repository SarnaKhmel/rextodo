<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class searchController extends Controller
{
    //
    public function searchUp( Request $request){

        dd($request->all());

        if($request->ajax()){
            $output = "";
            $tasks = DB::table('tasks')->where('title','LIKE','%'.$request->search."%")->get();
        if(Auth::check()){
            if($tasks){
                foreach ($tasks as $key=>$task) {
                    $output .= '<tr>' .
                        '<td>' . $tasks->title . '<td>' .
                        '<td>' . $tasks->description . '<td>' .
                        '<td>' . $tasks->time . '<td>' .
                        '<td>' . $tasks->user_id . '<td>' .
                        '<td>' . $tasks->email_us . '<tr>' .
                        '</tr>';
                }
                return Response($output);

            }
        }}

    }

}
