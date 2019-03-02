<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        $user = Auth::user();
        $roleid = $user->role_id;
        if($roleid == 1)
        {
            return redirect('/admin');
        }
        elseif($roleid == 2)
        {
            return redirect('/manager');
        }
        elseif($roleid == 3)
        {
            return redirect('/devloper');
        }
        else
        {
        return view('home');
        }
    }
}
