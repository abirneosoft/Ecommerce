<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orderdetail;
use App\Mail\OrderMailToUser;
use App\Mail\OrderMailToAdmin;
use Illuminate\Support\Facades\Mail; 
class orderdetail_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=orderdetail::paginate(5);
        return view('admin.ordermanage',compact('order'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=orderdetail::insert([
            "user_email"=>$request->user_email,
            "product_id"=>$request->product_id,
            "price"=>$request->price,
            "quantity"=>$request->quantity,
            "total"=>$request->total,
            "coupon_code"=>$request->coupon_code,
            "coupon_id"=>$request->coupon_id
        ]);

        Mail::to($request->user_email)->send(new OrderMailToUser($request->all()));
        Mail::to($request->user_email)->send(new OrderMailToAdmin($request->all()));
        return response()->json(["data"=>$data,"message"=>"sucess"]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=orderdetail::where('user_email',$id)->get();
        return response()->json(["order"=>$order]);


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
