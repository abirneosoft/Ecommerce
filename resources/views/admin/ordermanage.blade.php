@extends('admin.master')
@section('content')

<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title btn btn-light"><i class="fa fa-eye" aria-hidden="true"></i> ORDER DETAILS</h3>
                </div>
              <table class="table">
              <thead>
               <tr>
              <th>user email</th>    
              <th>product id</th>
              <th>price</th>
              <th>quantity</th>
              <th>Total</th>
              </tr>
              </thead>
              
             <tbody>
          <tr >
          @foreach($order as $o)
          <td>{{$o->user_email}}</td>
          <td>{{$o->product_id}}</td>
          <td>{{$o->price}}</td>
          <td>{{$o->quantity}}</td>
          <td>{{$o->total}}</td>
      
    </tr>
   
   @endforeach
    </tbody>
</table>
      
             
     </div>
   </div>
   {{$order->links() }}
</div>
</div>
</section>
<style>
  .w-5{
    display:none;
  }
</style>

@stop