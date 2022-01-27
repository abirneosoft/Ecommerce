@extends('admin.master')
@section('content')
<div class="content-wrapper">
<section class="content">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/product_manage" enctype="multipart/form-data">
               @csrf()    
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Product Name </label>
                <input type="text" class="form-control" name="name" />
                @if($errors->has('name'))
                <span class="text-danger" >{{$errors->first('name')}}</span>
                 @endif
              </div>
              <div class="form-group">
                <label>Descriptionn</label>
                <textarea name="description" class="form-control"></textarea>
                 @if($errors->has('description'))
                 <span class="text-danger" >{{$errors->first('description')}}</span>
                 @endif
              </div>
              <div class="form-group">
                <label>Quantity </label>
                <input type="text" class="form-control" name="quantity" />
                @if($errors->has('quantity'))
                <span class="text-danger" >{{$errors->first('quantity')}}</span>
                 @endif
              </div>
             
              <div class="form-group">
                <label>Price </label>
                <input type="number" class="form-control" name="price" />
                @if($errors->has('price'))
                <span class="text-danger" >{{$errors->first('price')}}</span>
                 @endif
              </div>
              <div class="form-group">
                <label>selling Price </label>
                <input type="number" class="form-control" name="sale_price" />
                @if($errors->has('sale_price'))
                <span class="text-danger" >{{$errors->first('sale_price')}}</span>
                 @endif
              </div>
              <div class="form-group">
                <label>Product image </label> <br>
                <input type="file" class="form-contol" name="file"/> <br><br>
                 @if($errors->has('file'))
                <span class="text-danger" > {{$errors->first('file')}} </span>
                 @endif   
                </div>
                <div class="form-group">
                 <label for="category_name" >category name</label>
                  <select name="cname">
                  <option></option>
                     @foreach($cat as $c)
                     <option value="{{$c->id}}">{{$c->category_name}}</option>
                     @endforeach  
                </select>
                @if($errors->has('cname'))
                <span class="text-danger" >{{$errors->first('cname')}}</span>
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