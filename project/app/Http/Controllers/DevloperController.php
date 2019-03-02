<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Task;

class DevloperController extends Controller
{
    public function index()
    {
    	return view('devloper.devloper');
    }

    public function task()
    {
    	$user = User::find(Auth::user()->id);
    	$data['tasks'] = $user->devloper_task;
    	return view('devloper.task',$data);
    }
    public function edit($id)
    {
    	$data['results'] = Task::find($id);
    	return view('devloper.edit',$data);
    }
    public function update(Request $request,$id)
    {
    	$details = array('status' => $request->get('status'));
    	Task::where('id',$id)->update($details);
    	return redirect('devloper');
    }
}
