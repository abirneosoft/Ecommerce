@extends('admin.master')
@section('content')
<section class="content-wrapper">
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
                <label class="alert alert-danger" >{{$errors->first('name')}}</label>
                 @endif
              </div>
              <div class="form-group">
                <label>Descriptionn</label>
                <textarea name="description" class="form-control"></textarea>
                 @if($errors->has('description'))
                 <label class="alert alert-danger" >{{$errors->first('description')}}</label>
                 @endif
              </div>
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
                <label>selling Price </label>
                <input type="number" class="form-control" name="sale_price" />
                @if($errors->has('sale_price'))
                <label class="alert alert-danger" >{{$errors->first('sale_price')}}</label>
                 @endif
              </div>
              <div class="form-group">
                <label>Product image </label> <br>
                <input type="file" class="form-contol" name="file"/> <br><br>
                 @if($errors->has('file'))
                <label class="alert alert-danger" > {{$errors->first('file')}} </label>
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
                <label class="alert alert-danger" >{{$errors->first('cname')}}</label>
                 @endif
                </div>


            <input type="submit" value="Submit" class="btn btn-success"/>
        </form>
     </div>
   </div>
</div>
</div>
</section>

@stop