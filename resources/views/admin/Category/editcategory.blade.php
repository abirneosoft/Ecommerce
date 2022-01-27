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
              <form method="post" action="/category/{{$cat->id}}" enctype="multipart/form-data">
               @csrf() 
              @method('put')

                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Category Name </label>
                <input type="text" class="form-control" name="name" value="{{$cat->category_name}}" />
                @if($errors->has('name'))
                <label class="alert alert-danger" >{{$errors->first('name')}}</label>
                 @endif
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" value="">{{$cat->description}}</textarea>
                 @if($errors->has('description'))
                 <label class="alert alert-danger" >{{$errors->first('description')}}</label>
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