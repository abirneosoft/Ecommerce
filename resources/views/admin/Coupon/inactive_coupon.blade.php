@extends('admin.master')
@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>COUPON </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
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
     
     
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($coup as $c)
      <td>{{$c->code}}</td>
      <td>{{$c->type}}</td>
      <td>{{$c->value}}</td>
    
     
    
        

    </tr>
   @endforeach
   
  </tbody>
</table>
{{$coup->links("pagination::bootstrap-4")}}
             
     </div>
   </div>
</div>
</div>
</section>
</div>
<!-- <style>
  .w-5{
    display:none;
  }
</style> -->

@stop