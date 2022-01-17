<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_image;
use App\Models\product;

class product_image_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pro_img=product_image::all();
        return view('admin.showproduct_image',compact('pro_img'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pro=product::all();
        return view('admin.product_image',compact('pro'));
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
        $validateData=$request->validate(
            [
                'file'=>'required',
                'pname'=>'required'
            ],[
                'file.required'=>'plz select any image',
            ]
        );
        if($validateData){
            $pname=$request->pname;

            $file=$request->file('file');
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
        $pro=product_image::find($id);
        return view('admin.editproduct_img',compact('pro')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $file=$request->file('file');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('products/'),$filename);
        
        $pro=product_image::where('id',$id)->update([

            'product_images'=>$filename
        ]);
        return redirect('/product_image');
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
