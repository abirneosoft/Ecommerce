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
              <form method="post" action="/cms/{{$cms->id}}" enctype="multipart/form-data">
               @csrf()   
               @method('put') 
               <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"  placeholder="Enter title" value="{{$cms->title}}">
                        @if($errors->has('title'))
                            <label  class="alert alert-danger">{{$errors->first('title')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea name="body" class="form-control" placeholder="Enter body">{{$cms->body}}</textarea>
                            @if($errors->has('body'))
                                <label class="alert alert-danger">{{$errors->first('body')}}</label>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control"  name="image" >
                        <!-- <img src="{{asset('/uploads/'.$cms->image)}}" width="50" height="50"><br> -->
                        @if($errors->has('image'))
                            <label  class="alert alert-danger">{{$errors->first('image')}}</label>
                        @endif
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-warning">Update CMS</button>
                    </div>
               
                
        </form>
     </div>
   </div>
</div>
</div>
</section>

@stop