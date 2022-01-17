<?php

namespace App\Http\Controllers;
use Illuminate\Support\facades\Hash; 

use Illuminate\Http\Request;
use App\Models\role;
use App\Models\category;
use App\Models\banner;
use App\Models\User;
use App\Models\coupon;
use App\Models\product;
use App\Models\product_image;


class usercontroller extends Controller
{
    //

    public function login(){
        return view('admin.login');
    }
    public function user(){
        $role=role::all();
        return view('admin.user',compact('role'));
    }
    public function postuser(Request $req){
        $validateData=$req->validate([
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
               
                $fname=$req->fname;
                $lname=$req->lname;
                $email=$req->email;
                $password=$req->password;
                $status=$req->status;
                $role=$req->role;
                $user=new User();
                $user->first_name=$fname;
                $user->last_name=$lname;
                $user->email=$email;
                $user->password=hash::make($password);
                $user->status=$status;
                
            
                
                $user->r_id=$role;
                $user->save();
                return redirect('/user');
            }
            else{
                return "unsuccess";
            }
        

    }
    public function showuser($id){
        $user=User::where('r_id',5)->get();
        $role=role::where('role_name','Customer')->first();
        return view('admin.showuser',compact('user','role'));
    }
    public function edituser($id){
        $user=User::find($id);
        return view('admin.edituser',compact('user'));
    }
    
    public function editpostuser(Request $req,$id){
        $user=User::where('id',$id)->update([
            'first_name'=>$req->fname,'last_name'=>$req->lname,'email'=>$req->email,'status'=>$req->status
      ]); 
      return redirect('/user/showuser/{id}');
        
    }
    public function product(){
        return view('admin.product');
    }
    public function postproduct(Request $req){
        $validateData=$req->validate([
            'name'=>'required|min:4',
            'description'=>'required|min:2',
            'quantity'=>'required|min:2',
            
            'price'=>'required',
            'sale_price'=>'required'
            
            ],[
            'name.required'=>'plz enter product name',
            'description.required'=>'plz enter description',
            'quantity.required'=>'plz enter quantity',
            
            'price.required'=>'plz enter valid status',
            'sale_price.required'=>'plz enter selling price',

            ]);
            if($validateData){
               
                $name=$req->name;
                $description=$req->description;
                $quantity=$req->quantity;
               
                $price=$req->price;
                $sale_price=$req->sale_price;
                $product=new product();
                $product->product_name=$name;
                $product->description=$description;
                $product->quantity=$quantity;
               
                $product->price=$price;
                $product->sale_price=$sale_price;
                $product->save();
                return redirect('/user/product');
            }
            else{
                return "unsuccess";
            }
        

    }
    public function showproduct(){
        $pro=product::all();
        return view('admin.showproduct',compact('pro'));
    }
    public function editproduct($id){
        $pro=product::find($id);
        return view('admin.editproduct',compact('pro'));
    }
    public function editpostproduct(Request $req,$id){
        $pro=product::where('id',$id)->update([
            'product_name'=>$req->name,'description'=>$req->description,'quantity'=>$req->quantity,'price'=>$req->price,'sale_price'=>$req->sale_price
      ]); 
      return redirect('/user/showproduct');
    }
    public function category(){
        return view('admin.category');
    }
    public function postcategory(Request $req){
        $validateData=$req->validate(
            [
                'name'=>'required',
                'description'=>'required|min:5|max:200'
                
            ]
        );
        if($validateData){
           $cname=$req->name;
           $description=$req->description;
              $cat=new category();
               $cat->category_name=$cname;
               $cat->description=$description;
                $cat->save();
              
        
        }
    }
    public function product_image(){
        $pro=product::all();
        return view('admin.product_image',compact('pro'));
    }
    public function postproduct_image(Request $req){
        $validateData=$req->validate(
            [
                'file'=>'required'
            ],[
                'file.required'=>'plz select any image',
            ]
        );
        if($validateData){
            $pro_id=$req->id;

            $file=$req->file('file');
            $dest=public_path('/products');
            $fname="Image-".rand()."-".time().".".$file->extension();
            if($file->move($dest,$fname))
            {
                $pro=new product_image();
                
                $pro->product_images=$fname;
                $pro->product_id=$pro_id;
                if($pro->save()){
                   return redirect("/user/product");
                }
                else {
                    $path=public_path()."products/".$fname;
                    unlink($path);
                    return back()->with('errMsg','Image Not Added');
                }
            } 
                
              
        
        }
    }
    public function editproduct_img($id){
        $pro=product_image::find($id);
        return view('admin.editproduct_img',compact('pro'));
    }
    public function posteditproduct_img(Request $req,$id){
        $file=$req->file('file');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('products/'),$filename);
        
        $pro=product_image::where('id',$id)->update([

            'product_images'=>$filename
        ]);
        return redirect('/user/showproduct_image');
    }
    public function showproduct_image(){
        $pro_img=product_image::all();
        return view('admin.showproduct_image',compact('pro_img'));
    }
    public function banner(){
        return view('admin.banner');
    }
    public function postbanner(Request $req){
        $validateData=$req->validate(
            [
                'title'=>'required|min:2',
                'description'=>'required|min:10',
                'file'=>'required|mimes:jpg,png,jpeg,JPG,PNG,JPEG,gif,GIF'
            ],[
                'title.required'=>'plz enter title',
                'description.required'=>'plz enter description',
                'file.required'=>'plz select any file',
            ]
        );
        if($validateData){
           $title=$req->title;
           $description=$req->description;
           $file=$req->file('file');
           $dest=public_path('/uploads');
           $fname="Image-".rand()."-".time().".".$file->extension();
           if($file->move($dest,$fname))
           {
               $ban=new banner();
               $ban->title=$title;
               $ban->description=$description;
               $ban->banner_image=$fname;
               if($ban->save()){
                  return redirect("/user/banner");
               }
               else {
                   $path=public_path()."uploads/".$fname;
                   unlink($path);
                   return back()->with('errMsg','Image Not Added');
               }
           }
           else {
               return back()->with('errMsg','Uploading Error');
           }
        
       }

    }
    public function showcategory(){
        $cat=category::all();
        return view('admin.showcategory',compact('cat'));
    }
    public function editcategory($id){
        $cat=category::find($id);
        return view('admin.editcategory',compact('cat'));
    }
    public function editpostcategory(Request $req,$id){
        $cat=category::where('id',$id)->update([
            'category_name'=>$req->name,'description'=>$req->description
      ]); 
      return redirect('/user/showcategory');
    }

    public function coupon(){
        return view('admin.coupon');
    }
    public function postcoupon(Request $req){
        $validateData=$req->validate(
            [
                'code'=>'required|min:2',
                'type'=>'required',
                'value'=>'required|min:2',
                'status'=>'required'
            ],[
                'code.required'=>'plz enter code',
                'type.required'=>'plz select type',
                'value.required'=>'plz enter value',
                'status.required'=>'plz select status',
            ]
        );
        if($validateData){
            $coupon=new coupon();
            $code=$req->code;
            $type=$req->type;
            $value=$req->value;
            $status=$req->status;
            $coupon->code=$code;
            $coupon->type=$type;
            $coupon->value=$value;
            $coupon->status=$status;
            $coupon->save();
        }else{
            
        }
    }
    public function editcoupon($id){
        $coup=coupon::find($id);
        return view('admin.editcoupon',compact('coup'));
    }
    public function editpostcoupon(Request $req,$id){
        $coup=coupon::where('id',$id)->update([
            'code'=>$req->code,'type'=>$req->type,'value'=>$req->value,'status'=>$req->status
      ]); 
      return redirect('/user/showcoupon');
     
    }
    public function showcoupon(){
        $coup=coupon::paginate(5);
        return view('admin.showcoupon',compact('coup'));
    }
    public function pro_manage(){
        $pro=product::all();
        $cat=category::all();
        return view('admin.pro_manage',compact('cat','pro'));
    }
    public function postpro_manage(Request $req){
        $validateData=$req->validate([
            'name'=>'required|min:4',
            'description'=>'required|min:2',
            'quantity'=>'required|min:2',
            
            'price'=>'required',
            'sale_price'=>'required'
            
            ],[
            'name.required'=>'plz enter product name',
            'description.required'=>'plz enter description',
            'quantity.required'=>'plz enter quantity',
            
            'price.required'=>'plz enter valid status',
            'sale_price.required'=>'plz enter selling price',

            ]);
            if($validateData){
               
                $name=$req->name;
                $description=$req->description;
                $quantity=$req->quantity;
               
                $price=$req->price;
                $sale_price=$req->sale_price;
                $product=new product();
                $product->product_name=$name;
                $product->description=$description;
                $product->quantity=$quantity;
               
                $product->price=$price;
                $product->sale_price=$sale_price;
                if($product->save()){
                    $pname=$req->pname;

                    $file=$req->file('file');
                    $dest=public_path('/products');
                    $fname="Image-".rand()."-".time().".".$file->extension();
                    if($file->move($dest,$fname))
                    {
                        $pro=new product_image();
                        
                        $pro->product_images=$fname;
                        $pro->product_id=$pname;
                        if($pro->save()){
                           return redirect("/product_image");
                        }
                        else {
                            $path=public_path()."products/".$fname;
                            unlink($path);
                            return back()->with('errMsg','Image Not Added');
                        }
                    } 
                         
                }
                
            }
            else{
                
            }
        

    }
}
