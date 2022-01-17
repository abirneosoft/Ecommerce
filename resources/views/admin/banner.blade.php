@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Banner Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/banner" enctype="multipart/form-data">
               @csrf()    
               <div class="card-body">
                <div class="form-group">
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif 
              
               <div class="form-group">
                <label>Title</label>
               <input type="text" name="title">
                 @if($errors->has('title'))
                 <label class="alert alert-danger" >{{$errors->first('title')}}</label>
                 @endif
             </div>
               <div class="form-group">
                <label>Descriptionn</label>
                <textarea name="description" class="form-control"></textarea>
                 @if($errors->has('description'))
                 <label class="alert alert-danger" >{{$errors->first('description')}}</label>
                 @endif
             </div>
            <label>Choose your Banner</label>  
             <input type="file" class="form-contol" name="file"/> <br><br>
             @if($errors->has('file'))
             <label class="alert alert-danger" > {{$errors->first('file')}} </label>
             @endif
          </div>
          </div>

        <input type="submit" value="Submit" class="btn btn-success"/>
        </form>
     </div>
   </div>
</div>
</div>
</section>

@stop