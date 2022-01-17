@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/banner/{{$ban->id}}" enctype="multipart/form-data">
               @csrf()   
               @method('put') 
               <div class="card-body">
                <div class="form-group">
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif 
              
               <div class="form-group">
                <label>Title</label>
               <input type="text" name="title" value="{{$ban->title}}">
                 @if($errors->has('title'))
                 <label class="alert alert-danger" >{{$errors->first('title')}}</label>
                 @endif
             </div>
               <div class="form-group">
                <label>Descriptionn</label>
                <textarea name="description" class="form-control">{{$ban->description}}</textarea>
                 @if($errors->has('description'))
                 <label class="alert alert-danger" >{{$errors->first('description')}}</label>
                 @endif
             </div>
             <div class="form-group">

             
            <label>Choose your Banner</label>  
             <input type="file" class="form-contol" name="file" value="{{$ban->banner_image}}"/> <br><br>
             @if($errors->has('file'))
             <label class="alert alert-danger" > {{$errors->first('file')}} </label>
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