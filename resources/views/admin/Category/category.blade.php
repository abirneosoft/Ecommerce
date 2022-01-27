@extends('admin.master')
@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CATEGORY</h1>
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
                <h3 class="card-title">Category Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/category" enctype="multipart/form-data">
               @csrf()    
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Category Name </label>
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
            
        <input type="submit" value="Submit" class="btn btn-success"/>
        </form>
     </div>
   </div>
</div>
</div>
</section>
</div>
@stop