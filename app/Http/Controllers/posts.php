<?php

namespace App\Http\Controllers;

use App\post;
use App\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class posts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {   
	     $idUser = Auth::id();; // some logic to decide user's plan
		 $request->request->add(['id_user' => $idUser, 'id_task' => $id]);
	    post::create($request->all());
	   
	    return redirect()->action('posts@post', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
        public function post($id) {
		$idUser = Auth::id();
        $level = DB::table('users')->where('id', $idUser)->first();
        if ($level->level == 1) {
		        $tasks = DB::table('tasks')
	            ->leftJoin('users', 'tasks.id_client', '=', 'users.id')
	            ->leftJoin('status', 'tasks.id_status', '=', 'status.id_status')
	            ->select('tasks.*', 'status.name', 'users.email')
	            ->where('tasks.id', '=', $id)
	            ->orderBy('tasks.created_at', 'desc')
	            ->get();


		        $posts = DB::table('posts')
	            ->leftJoin('users', 'posts.id_user', '=', 'users.id')
	            ->select('posts.*', 'users.email', 'users.name')
	            ->where('posts.id_task', '=', $id)
	            ->orderBy('posts.created_at', 'asc')
	            ->get();




			   return view('task', ['tasks' => $tasks, 'posts' => $posts]);
        
        } else { 
        	
        	
        	
        	 $tasks = DB::table('tasks')
	            ->leftJoin('users', 'tasks.id_client', '=', 'users.id')
	            ->leftJoin('status', 'tasks.id_status', '=', 'status.id_status')
	            ->select('tasks.*', 'status.name', 'users.email')
	            ->where('tasks.id', '=', $id)
	            ->orderBy('tasks.created_at', 'desc')
	            ->get();


		        $posts = DB::table('posts')
	            ->leftJoin('users', 'posts.id_user', '=', 'users.id')
	            ->select('posts.*', 'users.email', 'users.name')
	            ->where('posts.id_task', '=', $id)
	            ->orderBy('posts.created_at', 'asc')
	            ->get();




			   return view('task', ['tasks' => $tasks, 'posts' => $posts]);
        	
        	
        }
	}
	
	
    public function close(Request $request, $id)
    {






$task = Task::find($id);

$task->close = '1';
$task->id_status = '2';

$task->save();
	    
	   return redirect()->action('posts@post', $id);
    }
	
    
}
