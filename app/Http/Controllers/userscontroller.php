<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\facades\Hash; 

class userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=User::where('is_admin','0')->paginate(5);
        // $role=role::where('role_name','Customer')->first();
         return view('admin.showuser',["user"=>$user]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role=role::all();
        return view('admin.user',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData=$request->validate([
            'fname'=>'required|min:4',
            'lname'=>'required|min:2',
            'email'=>'required|min:4|max:255',
            'password'=>'required|min:6',
            'cpassword'=>'required_with:password|same:password|min:6',
            'status'=>'required',
            'role'=>'required'
            ],[
            'fname.required'=>'plz enter first name',
            'lname.required'=>'plz enter last name',
            'email.required'=>'plz enter valid email',
            'password.required'=>'plz enter valid password ',
            'status.required'=>'plz enter valid status',
            'role.required'=>'plz enter valid role',

            ]);
            if($validateData){
               
                $fname=$request->fname;
                $lname=$request->lname;
                $email=$request->email;
                $password=$request->password;
                $status=$request->status;
                $role=$request->role;
                $user=new User();
                $user->first_name=$fname;
                $user->last_name=$lname;
                $user->email=$email;
                $user->password=hash::make($password);
                $user->status=$status;
                 $user->r_id=$role;
                $user->save();
                return redirect('/users');
            }
            else{
                return "unsuccess";
            }
        

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
        $user=User::where('r_id',5)->get();
        $role=role::where('role_name','Customer')->first();
        return view('admin.showuser',compact('user','role'));
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
        $user=User::find($id);
        return view('admin.edituser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $user=User::where('id',$id)->update([
            'first_name'=>$req->fname,'last_name'=>$req->lname,'email'=>$req->email,'status'=>$req->status
      ]); 
      return redirect('/users');
  
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
}
