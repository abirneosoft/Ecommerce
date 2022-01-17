@extends('admin.master')
@section('content')
<section class="content-wrapper">
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
                            <label  class="alert alert-danger">{{$errors->first('title')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea name="body" class="form-control" placeholder="Enter body"></textarea>
                            @if($errors->has('body'))
                                <label class="alert alert-danger">{{$errors->first('body')}}</label>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control"  name="image" >
                        @if($errors->has('image'))
                            <label  class="alert alert-danger">{{$errors->first('image')}}</label>
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

@stop