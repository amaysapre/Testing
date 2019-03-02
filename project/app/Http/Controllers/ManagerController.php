<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use Auth;

class ManagerController extends Controller
{
   public function index()
   {
   	return view('manager.manager');
   }

   public function add()
  	{
  	$res['results'] = User::where('role_id','3')->where('admin_id',Auth::user()->id)->get();
  	$res['id'] = Auth::user()->id;
  	return view('manager.addtask',$res);
  	}

   public function create_task(Request $request)
    {
  	Task::create($request->all());
  	return redirect('manager/task');
    }
   public function task()
   {
   		$id = Auth::user()->id;
   		$data['tasks'] = Task::where('assign_by',$id)->get();
   		return view('manager.task',$data);
   } 

   public function devloperlist()
   {
   		$id = Auth::user()->id;
   		$data['devlopers'] = User::where('admin_id',$id)->get();
   		return view('manager.devloper',$data);
   }

   public function edit($id)
   {
   	$data['results'] = User::find($id);
   	return view('manager.edit',$data);
   }
   public function update(Request $request,$id)
   {
   	 $updatedetails=array('name'=>$request->get('name'));
   	 User::where('id',$id)->update($updatedetails);
   	 return redirect('manager/devloper');
   }

   public function add_devloper()
   {
     return view('manager.devadd');
   }

   public function create_devloper(Request $request)
   {
      User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'admin_id' => $request->admin_id,
          ]);
     return redirect('manager/devloper');       

   }
   public function editstatus($id)
   {
      $data['status']=Task::find($id);
      // echo '<pre>';
      // print_r($data['status']);die();
      return view('manager.statusmgr',$data);
   }

   public function updatebymgr(Request $request,$id)
   {
      $details = array('status' => $request->get('status'));
      Task::where('id',$id)->update($details);
      return redirect('manager/task');
   }
   
   public function destroy($id)
   { //echo $id;die();
    Task::find($id)->delete();
    return redirect('manager/task');
   }

   public function del($id)
   {
      //echo $id;die();
      User::find($id)->delete();
      return redirect('manager/devloper');
      
   }
}
