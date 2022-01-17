@extends('admin.master')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/users/{{$user->id}}" method="post">
              @csrf
              @method('put')
                <div class="card-body">
                <div class="form-group">
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif 
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" name="fname" value="{{$user->first_name}}">
                    @if($errors->has('fname'))
                <label class="alert alert-danger" >{{$errors->first('fname')}}</label>
                 @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" name="lname" value="{{$user->last_name}}">
                    @if($errors->has('lname'))
                <label class="alert alert-danger" >{{$errors->first('lname')}}</label>
                 @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                    @if($errors->has('email'))
                <label class="alert alert-danger" >{{$errors->first('email')}}</label>
                 @endif
                  </div>
                 
                  
      <!-- Group of material radios - option 1 -->
      <label for="exampleInputPassword1">status</label>
            <div class="form-check">
             <input type="radio" class="form-check-input" id="materialGroupExample1" name="status" value="active" {{ $user->status == 'active' ? 'checked' : ''}}>
             <label class="form-check-label" for="materialGroupExample1">Active</label>
            </div>

            <div class="form-check">
            <input type="radio" class="form-check-input" id="materialGroupExample2" name="status" value="inactive" {{ $user->status == 'inactive' ? 'checked' : ''}}>
            <label class="form-check-label" for="materialGroupExample2">in Active</label>
            @if($errors->has('status'))
                <label class="alert alert-danger" >{{$errors->first('status')}}</label>
                 @endif
            </div>
           
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           

          </div>
        
        </div>
        
      </div>
    </section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@stop