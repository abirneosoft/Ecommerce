<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;

class couponcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coup=coupon::where('status','active')->paginate(5);
        return view('admin.showcoupon',compact('coup'));
    }
    public function couponInactive()
    {
        //
        $coup=coupon::join('orderdetails','coupons.id','=','orderdetails.coupon_id')->paginate(5);
        return view('admin.inactive_coupon',compact('coup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.coupon');
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
            $code=$request->code;
            $type=$request->type;
            $value=$request->value;
            $status=$request->status;
            $coupon->code=$code;
            $coupon->type=$type;
            $coupon->value=$value;
            $coupon->status=$status;
            $coupon->save();
            return redirect('/coupon');
        }else{
            
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
        $coup=coupon::find($id);
        return view('admin.editcoupon',compact('coup'));
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
        $coup=coupon::where('id',$id)->update([
            'code'=>$request->code,'type'=>$request->type,'value'=>$request->value,'status'=>$request->status
      ]); 
      return redirect('/coupon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        coupon::find($id)->delete();
        return redirect('/coupon');
    }
}
