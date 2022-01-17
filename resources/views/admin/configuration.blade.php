@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Configuration Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/configuration/{{$con->id}}" enctype="multipart/form-data">
               @csrf() 
              @method('put')

                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Email </label>
                <input type="email" class="form-control" name="email" value="{{$con->admin_email}}" />
                @if($errors->has('email'))
                <label class="alert alert-danger" >{{$errors->first('email')}}</label>
                 @endif
            </div>
            <div class="form-group">
            <label>Notification email </label>
                <input type="email" class="form-control" name="notification_email" value="{{$con->notification_email}}" />
                @if($errors->has('notification_email'))
                <label class="alert alert-danger" >{{$errors->first('notification_email')}}</label>
                 @endif
             </div>
             <div class="form-group">
            <label>Phone </label>
                <input type="number" class="form-control" name="phone" value="{{$con->phone_no}}" />
                @if($errors->has('phone'))
                <label class="alert alert-danger" >{{$errors->first('phone')}}</label>
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