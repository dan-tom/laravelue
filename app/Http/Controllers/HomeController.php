<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
		
		$id = Auth::id();
        $level = DB::table('users')->where('id', $id)->first();
        
        
        if ($level->level == 1) {
	        
	        
		        $tasks = DB::table('tasks')
	            ->leftJoin('users', 'tasks.id_client', '=', 'users.id')
	            ->leftJoin('status', 'tasks.id_status', '=', 'status.id_status')
	            ->select('tasks.*', 'status.name', 'users.email', 'users.level')
	            ->orderBy('tasks.created_at', 'desc')
	            ->get();

			   return view('home', ['tasks' => $tasks]);
        
        } else { 
        	
        	
        		$tasksuser = DB::table('tasks')
	            ->leftJoin('users', 'tasks.id_client', '=', 'users.id')
	            ->leftJoin('status', 'tasks.id_status', '=', 'status.id_status')
	            ->select('tasks.*', 'status.name', 'users.email', 'users.level')
	            ->where('tasks.id_client', '=', $id)
	            ->orderBy('tasks.created_at', 'desc')
	            ->get();

			   return view('home', ['tasks' => $tasksuser]);
        	
        	
        }
    }
}