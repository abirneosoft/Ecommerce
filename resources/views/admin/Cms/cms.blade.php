@extends('admin.master')
@section('content')

<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CMS</h1>
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
                <h3 class="card-title">CMS Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/cms" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"  placeholder="Enter title">
                        @if($errors->has('title'))
                            <span  class="text-danger">{{$errors->first('title')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea name="body" class="form-control" placeholder="Enter body"></textarea>
                            @if($errors->has('body'))
                                <span class="text-danger">{{$errors->first('body')}}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control"  name="image" >
                        @if($errors->has('image'))
                            <span  class="text-danger">{{$errors->first('image')}}</span>
                        @endif
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-success">Add CMS</button>
                        
                    </div>
                </form>
       


                   </div>
   </div>
</div>
</div>
</section>
</div>
@stop