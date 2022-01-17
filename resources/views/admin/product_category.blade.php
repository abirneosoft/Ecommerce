@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/product_category" enctype="multipart/form-data">
               @csrf()    
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                 <label for="category_name">category name</label>
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
              <div>      
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