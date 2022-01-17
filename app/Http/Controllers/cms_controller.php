<?php

namespace App\Http\Controllers;
use App\Models\cms;

use Illuminate\Http\Request;

class cms_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cmss= cms::latest()->paginate(2);
        return view('admin.showcms',compact('cmss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cms');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'title'=>'required|min:5|max:150',
            'body'=>'required|min:6|max:255',
            'image'=>'required|mimes:jpg,png,jpeg',
        ]);
    if($validate){
       $title=$request->title;
       $body=$request->body;
       $file=$request->file('image');
       $dest=public_path('/uploads');
       $fname="Image-".rand()."-".time().".".$file->extension();
       if($file->move($dest,$fname))
       {
            $cms=new cms();
            $cms->title=$title;
            $cms->body=$body;
        
            $cms->image=$fname;
            if($cms->save()){
                return redirect("/cms");
            }
            
        }
        else{
               $path=public_path()."uploads/".$fname;
               unlink($path);
               return back()->with('error','cms could not added');
           }
       }
       else {
           return back()->with('error','Uploading Error');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cms=cms::where('id',$id)->first();
        return view('admin.editcms',compact('cms'));
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
        $file=$request->file('image');
        
        if($file){
            $extension=$file->getClientOriginalExtension();
              $filename=time().'.'.$extension;
             $file->move(public_path('uploads/'),$filename);
             $cms=cms::where('id',$id)->update([

                'title'=>$request->title,'body'=>$request->body,'image'=>$filename
            ]);
            return redirect('/cms');
        }
        $cms=cms::where('id',$id)->update([

            'title'=>$request->title,'body'=>$request->body
        ]);
        return redirect('/cms');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cms::find($id)->delete();
        return redirect('/cms');
    }
}
