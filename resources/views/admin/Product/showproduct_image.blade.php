@extends('admin.master')
@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PRODUCT </h1>
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
              <h3 class="card-title btn btn-light"><i class="fa fa-eye" aria-hidden="true"></i> show product image</h3>
              <a href="/product_image/create" class="btn btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i>Add image</a>       


              </div>
              <table class="table">
  <thead>
    <tr>
      
      
      <th scope="col">Image</th>
      <th  scope="col">Action</th>    
        
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($pro_img as $p)

      <td><img src="{{url('products/'.$p->product_images)}}" height="80" width="80"/></td>
      
      

      <td><a href="/product_image/{{$p->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a> &nbsp &nbsp <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
   
   @endforeach
  </tbody>
</table>
      
             
     </div>
   </div>
</div>
</div>
</section>
</div>
@stop