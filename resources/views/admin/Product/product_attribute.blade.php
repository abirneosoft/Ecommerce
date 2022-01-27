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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Attribute</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="" enctype="multipart/form-data">
               @csrf()    
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
               <div class="form-group">
                <label>Quantity </label>
                <input type="text" class="form-control" name="quantity" />
                @if($errors->has('quantity'))
                <label class="alert alert-danger" >{{$errors->first('quantity')}}</label>
                 @endif
              </div>
             
              <div class="form-group">
                <label>Price </label>
                <input type="number" class="form-control" name="price" />
                @if($errors->has('price'))
                <label class="alert alert-danger" >{{$errors->first('price')}}</label>
                 @endif
              </div>
         <div class="form-group">      
            <label for="product_name">Product name</label>
            <select name="pname">
             <option></option>
             @foreach($pro as $p)
             <option value="{{$p->id}}">{{$p->product_name}}</option>
             @endforeach
           </select>
           @if($errors->has('pname'))
                <label class="alert alert-danger" >{{$errors->first('pname')}}</label>
                 @endif
            </div>
            
              
            <input type="submit" value="Submit" class="btn btn-success"/>
        </form>
     </div>
   </div>
</div>
</div>
</section>
</div>
@stop