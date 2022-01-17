<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\product_categories;
use App\Models\product_attribute;

use App\Models\product_image;
class Product_manange_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pro=product::all();
        
        return response()->json($pro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=category::all();
        return view('admin.product',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'name'=>'required|min:4',
            'description'=>'required|min:2',
            'quantity'=>'required|min:2',
            
            'price'=>'required',
            'sale_price'=>'required',
            'file'=>'required',
            'cname'=>'required'
            
            ],[
            'name.required'=>'plz enter product name',
            'description.required'=>'plz enter description',
            'quantity.required'=>'plz enter quantity',
            
            'price.required'=>'plz enter valid status',
            'sale_price.required'=>'plz enter selling price',
            'file.required'=>'plz choose product image',
            'cname.required'=>'plz select any category',
            

            ]);
            if($validateData){
                $name=$request->name;
                $description=$request->description;
                $quantity=$request->quantity;
                $price=$request->price;
                $sale_price=$request->sale_price;
                $cname=$request->cname;
                $product=new product();
                $product->product_name=$name;
                $product->description=$description;
                $product->quantity=$quantity;
                $product->price=$price;
                $product->sale_price=$sale_price;
                if($product->save()){
                $data=product::latest()->first();
                
                 $file=$request->file('file');
                  $dest=public_path('/products');
                  $fname="Image-".rand()."-".time().".".$file->extension();
            

                    if($file->move($dest,$fname))
                    {
                        $pro=new product_image();
                        
                        $pro->product_images=$fname;
                        $pro->product_id=$data->id;
                        if($pro->save()){
                            $pro_cat=new product_categories();
                            $pro_cat->product_id=$data->id;
                            $pro_cat->category_id=$cname;
                            if($pro_cat->save()){
                                $pro_att=new product_attribute();
                                $pro_att->quantity=$quantity;
                                $pro_att->price=$price;
                                $pro_att->product_id=$data->id;
                                $pro_att->save();
                           return redirect("/product_manage");

                            }
                        }
                        else {
                            $path=public_path()."products/".$fname;
                            unlink($path);
                            return back()->with('errMsg','Image Not Added');
                        }
                    }
                }
                return redirect('/product_manage');
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
        $pro_img=product_image::where('product_id',$id)->get();
        return response()->json(['pro'=>$pro_img],200);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $pro=product::find($id);
        // $pro_img=product_image::find($id);
        // $cat=category::find($id);
        $pro = product::all()->where('id',$id)->first();
        $pro_img=product_image::all()->where('product_id',$id)->first();
        $cat=category::all();
        return view('admin.editproduct',compact('pro','pro_img','cat'));
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
        $pro=product::where('id',$request->pid)->update([
            'product_name'=>$request->name,'description'=>$request->description,'quantity'=>$request->quantity,'price'=>$request->price,'sale_price'=>$request->sale_price
      ]); 
      if($pro){
        $file=$request->file('file');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('products/'),$filename);
        $data=product::latest()->first();
        $pro_img=product_image::where('product_id',$request->pid)->update([
            'product_images'=>$filename
        ]);
      }
      if($pro_img){
        $cname=$request->cname;
        $data=product::latest()->first();
        $pro_cat=product_categories::where('product_id',$request->pid)->update([
        'category_id'=>$cname
      ]);
                            
      }

        $pro_att=product_attribute::where('product_id',$request->pid)->update([
            'quantity'=>$request->quantity,'price'=>$request->price
      ]); 
    
      return redirect('/product_manage');
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
