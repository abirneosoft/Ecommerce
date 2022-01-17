@extends('admin.master')
@section('content')
<section class="content-wrapper">
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

@stop