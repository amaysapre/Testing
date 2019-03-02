<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use Auth;
class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.admin');
    }

    public function taskall()
    {
    	//$id = Auth::user()->id;
    	$data['tasks'] = Task::all();
    	return view('admin.task',$data);
    }
    public function managerlist()
   
    {
        $data['managerlists'] = User::where('role_id','2')->get();
       
        return view('admin.managerlist',$data);
    }
    public function edit($id)
    {
        $data['results'] = User::find($id);
        // echo '<pre>';
        // print_r($data['results']);
        // die();
        return view('admin.adminedit',$data);

    }
    public function update(Request $request,$id)
    {
        $updatedetails=array('name'=>$request->get('name'));
        User::where('id',$id)->update($updatedetails);
        return redirect('admin/managerlist');
    }

    public function addmanager()
    {
        return view('admin.addmanager');
    }
    public function create_manager(Request $request)
    {
        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>bcrypt($request->password),
                'role_id' => $request->role_id,
        ]);
        return redirect('admin/managerlist');
    }    
    public function devloperlist()
    {
        $data['devlists'] = User::where('role_id','3')->get();
        // print_r($data['devlists']->toArray());
        // die();
        return view('admin.devloperlist',$data);
    }

    public function devedit($id)
    {
        $data['devedits'] = User::find($id);
        
        // print_r($data['devedits']);
        // die();
        return view('admin.devedit',$data);
    }

    public function devupdate(Request $request,$id)
    {
        $updatedetails = array('name' => $request->get('name'));
        User::where('id',$id)->update($updatedetails);
        return redirect('admin/devloperlist');
    
    }
    public function adddevloper()
    {
        $data['managers']=User::where('role_id','2')->get();
        return view('admin.adddevloper',$data);
    }
    public function create_devloper(Request $request)
    {
        User::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'password' =>bcrypt($request->password),
                 'role_id' => $request->role_id,
                 'admin_id' => $request->manager,

               ]);
        return redirect('admin/devloperlist');
    }
    public function edittask($id)
    {
        $data['tasks'] = Task::find($id);
        // print_r($data['tasks']->toArray());
        // die();
        $data['managerlists'] = User::where('role_id','2')->get();
        $manager = User::find($data['tasks']->assign_by);
        //$admin = User::find($data['tasks']);
        $data['devs'] = $manager->manager_dev_list; 
        return view('admin.edittask',$data);
    }
   public function get_dev(Request $request)
    {
        $mng_id = $request->mng_id;
        $manager = User::find($mng_id);
        $devs = $manager->manager_dev_list;
        echo '<option value="">Select</option>';
        foreach ($devs as $dev) {
        echo '<option value="'.$dev->id.'">'.$dev->name.'</option>';
       }

    }
    public function updatetask(Request $request,$id)
    {
        $details = array(
                 'task_name' => $request->get('task_name'),
                 'devloper_id' => $request->get('devloper_id'),
                 'assign_by' =>$request->get('assign_by'),
                 'duration' => $request->get('duration'),
                 'status' => $request->get('status'),
                 );
        Task::where('id',$id)->update($details);
        return redirect('admin/task');
    }

}
