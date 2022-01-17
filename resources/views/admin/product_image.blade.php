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
              <form method="post" action="/product_image" enctype="multipart/form-data">
               @csrf()    
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Product image </label> <br>
                <input type="file" class="form-contol" name="file"/> <br><br>
                 @if($errors->has('file'))
                <label class="alert alert-danger" > {{$errors->first('file')}} </label>
                 @endif   
                </div>
                    
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