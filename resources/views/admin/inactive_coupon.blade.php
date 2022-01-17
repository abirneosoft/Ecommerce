@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title bg-info  h-100 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)"> &nbsp;&nbsp; USED COUPON</h3>
               

              </div>
              <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Coupon Code</th>
      <th scope="col">Coupon Type</th>
      <th scope="col">Coupon Value</th>
      <th scope="col">Coupon Status</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($coup as $c)
      <td>{{$c->code}}</td>
      <td>{{$c->type}}</td>
      <td>{{$c->value}}</td>
    
     
      <td><a href="/coupon/{{$c->id}}/view" class="btn btn-primary"><i class="fas fa-eye"></i>VIEW</a> &nbsp &nbsp</td>
      

    </tr>
   @endforeach
   
  </tbody>
</table>
{{$coup->links()}}
             
     </div>
   </div>
</div>
</div>
</section>
<style>
  .w-5{
    display:none;
  }
</style>
@stop