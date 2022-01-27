@extends('admin.master')
@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PRODUCT IMAGE</h1>
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
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/product_image/{{$pro->id}}" enctype="multipart/form-data">
               @csrf()    
               @method('put')
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Product image </label> <br>
                <input type="file" class="form-contol" name="file" value="{{$pro->product_images}}"/> <br><br>
                 @if($errors->has('file'))
                <label class="alert alert-danger" > {{$errors->first('file')}} </label>
                 @endif   
                </div>
                    
                <input type="hidden" name="id" value="{{$pro->id}}">
              
               <input type="submit" value="Submit" class="btn btn-success"/>
        </form>
     </div>
   </div>
</div>
</div>
</section>
</div>
@stop