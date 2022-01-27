@extends('admin.master')
@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CONFIGURATION MANAGEMENT</h1>
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
                <span class="text-danger" >{{$errors->first('email')}}</span>
                 @endif
            </div>
            <div class="form-group">
            <label>Notification email </label>
                <input type="email" class="form-control" name="notification_email" value="{{$con->notification_email}}" />
                @if($errors->has('notification_email'))
                <span class="text-danger" >{{$errors->first('notification_email')}}</span>
                 @endif
             </div>
             <div class="form-group">
            <label>Phone </label>
                <input type="number" class="form-control" name="phone" value="{{$con->phone_no}}" />
                @if($errors->has('phone'))
                <span class="text-danger" >{{$errors->first('phone')}}</span>
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