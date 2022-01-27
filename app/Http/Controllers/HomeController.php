<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderdetail;
use App\Models\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function adminhome(){
        $order=orderdetail::count();
        $user=User::where('is_admin','0')->count();
        $visit=User::where('is_admin','1')->count();

        return view('admin.admin_home',compact('order','user','visit'));
    }
}
