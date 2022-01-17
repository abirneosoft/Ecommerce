<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;

class banner_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ban=banner::all();
        return view('admin.showbanner',compact('ban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner');
    
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
           $title=$request->title;
           $description=$request->description;
           $file=$request->file('file');
           $dest=public_path('/uploads');
           $fname="Image-".rand()."-".time().".".$file->extension();
           if($file->move($dest,$fname))
           {
               $ban=new banner();
               $ban->title=$title;
               $ban->description=$description;
               $ban->banner_image=$fname;
               if($ban->save()){
                  return redirect("/banner");
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
        $ban=banner::find($id);
        return view('admin.editbanner',compact('ban'));
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
        $file=$request->file('file');
        
        if($file){
            $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move(public_path('uploads/'),$filename);
        
        $ban=banner::where('id',$id)->update([

            'title'=>$request->title,'description'=>$request->description,'banner_image'=>$filename
        ]);
        return redirect('/banner');
    }
    $ban=banner::where('id',$id)->update([

        'title'=>$request->title,'description'=>$request->description
    ]);
    return redirect('/banner');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        banner::find($id)->delete();
        return redirect('/banner');
    }
}
