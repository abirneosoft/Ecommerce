<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_categories;
use App\Models\category;
use App\Models\product;



class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pro_cat=product_categories::all();
        return view('admin.Product.showproduct_category',compact('pro_cat'));

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
        $cat=category::all();
        return view('admin.Product.product_category',compact('cat','pro'));

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
            
            'cname'=>'required',
            'pname'=>'required'
            ],[
            'cname.required'=>'plz select category name',
            'pname.required'=>'plz select product name',
            ]);
            if($validateData){
               
               
                $cname=$request->cname;
                $pname=$request->pname;
                $pro_cat=new product_categories();
               
                 $pro_cat->category_id=$cname;
                 $pro_cat->product_id=$pname;

                $pro_cat->save();
                return redirect('/product_category');
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
        $pro_cat=product_categories::find($id);
        return view('admin.Product.editproduct_category',compact('pro_cat')); 
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
        //
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
