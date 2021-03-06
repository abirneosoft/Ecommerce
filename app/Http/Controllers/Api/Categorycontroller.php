<?php


namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\product_categories;
use App\Models\product_attribute;

use App\Models\product_image;

use App\Models\category;

class Categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat=category::all();
        //return view('admin.showcategory',compact('cat'));
        return response()->json(['cat'=>$cat],200);


    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate(
            [
                'name'=>'required',
                'description'=>'required|min:5|max:200'
                
            ]
        );
        if($validateData){
        $cname=$request->name;
        $description=$request->description;
        $cat=new category();
         $cat->category_name=$cname;
         $cat->description=$description;
          $cat->save();
          return redirect('/category');  
        
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
        $cat=category::join('product_categories','categories.id','=','product_categories.category_id')->join(
            'products','products.id','=','product_categories.product_id'
        )->join('product_images','products.id','=','product_images.product_id')->where('categories.id',$id)->get();
        return response()->json(['cat'=>$cat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=category::find($id);
        return view('admin.editcategory',compact('cat'));
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
        $cat=category::where('id',$id)->update([
            'category_name'=>$request->name,'description'=>$request->description
      ]); 
      return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::find($id)->delete();
        return redirect('/category');
    }
}
