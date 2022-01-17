<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\contact;
use App\Models\cms;
use App\Mail\RegisterMailToUser;
use App\Mail\RegisterMailToAdmin;
use Illuminate\Support\Facades\Mail; 



use Illuminate\Support\Facades\Hash;

class JWTController extends Controller
{
    public function __constract(){
        $this->middleware('auth:api',['except'=>['login','register','cms','cmsById']]);
    }
    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            
            'first_name'=>'required|string',
            'last_name'=>'required|string',

            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|min:4',
            'status'=>'required'
        
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=User::insert([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,

                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'status'=>$request->status,
                'r_id'=>5
            ]);
        Mail::to($request->email)->send(new RegisterMailToUser($request->all()));
        Mail::to($request->email)->send(new RegisterMailToAdmin($request->all()));

            return response()->json([
                'message'=>'User create successfully',
                'user'=>$user
            ],201);
        }
        
         
        

   }

   public function contact(Request $request){
    $validator=Validator::make($request->all(),[
            
        'name'=>'required|string',
        'email'=>'required|string|email|unique:users',
        'subject'=>'required|string',
        'message'=>'required|string'
    
    ]);
    if($validator->fails()){
        return response()->json($validator->errors());
    }
    else {
        $contact=contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message
            
        ]);
        return response()->json([
            'message'=>'contact create successfully',
            'contact'=>$contact
        ],201);
    }
    
   
   }
    public function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            if(!$token=auth()->guard('api')->attempt($validator->validated())){
               return response()->json(['error'=>'Unauthorized'],401);
            }
             //return $this->respondWithToken($token);
             return response()->json(['access_token' =>$token, 'email' => $request->email]); 

        }
    }
    protected function respondWithToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->guard('api')->factory()->getTTL()*60
        ]);
    }    
    public function logout(){
        auth()->guard('api')->logout();
        return response()->json(["message"=>"User Logout Successfully"]);
    }
    public function profile(){
        // $arr=["anuj","anil"];
        // return response()->json($arr);
        $profile=auth('api')->user();
        return response()->json(['profile'=>$profile]);

    }
    public function updateProfile(Request $request){
        $validator=Validator::make($request->all(),[
            'first_name'=>'required|min:2|alpha',
            'last_name'=>'required|min:2|alpha',
            'email'=>'required|email',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=User::find($request->user()->id);
                $user->first_name=$request->first_name;
                $user->last_name=$request->last_name;
                $user->email=$request->email;
                $user->update();
            return response()->json([
                'message'=>"profile updated successfully",
                'updatedprofile'=>$user
            ]);
        }
         return response()->json(['status'=>1,'updatedprofile'=>$user]);
     }
     public function changePassword(Request $request){
        $validator=Validator::make($request->all(),[
            'old_password'=>'required|min:6|max:12',
            'new_password'=>'required|min:6|max:12',
            'confirm_password'=>'required|min:6|max:12|same:new_password',

        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $user=$request->user();
            if(Hash::check($request->old_password,$user->password)){
               $user->update([
                   'password'=>Hash::make($request->new_password)
               ]);
               return response()->json([
                'message'=>"password successfully updated",
                'status'=>1
                ],200);
            }
           else{
                return response()->json([
                    'message'=>"old password does not match",
                ],400);
           }
        }
        return response()->json([
            'message'=>"password successfully updated",
            'status'=>1
        ]);
    }
    public function cms()
    {
        $cms = cms::all();
        foreach($cms as $c){
            $listcms[]=[
                'id'=>$c->id,
                'title'=>$c->title,
                'body'=>$c->body,
                'image'=> asset('uploads/'.$c->image)
              ];
          }
 
        return response()->json(['cms' => $listcms]);
    }
    public function cmsById($id)
    {
        $list = [];
        $cms=cms::find($id);
            $list[] = [
                'id' => $cms->id,
                'title' => $cms->title,
                'body' => $cms->body,
                'image'=>asset('uploads/'.$cms->image),
            ];
        return response()->json(['cmsbyid' => $list]);
    }
    public function refresh(){
        return $this->responseWithToken(auth()->refresh());
    }
}
