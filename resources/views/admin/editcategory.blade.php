@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
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

@stop