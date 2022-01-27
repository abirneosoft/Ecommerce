@extends('admin.master')
@section('content')

<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CONFIGURE </h1>
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
            <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title bg-info  h-100 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)"> CONFIGURATION</h3>
               
              </div>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">Admin Email</th>
      <th scope="col">notification email</th>
      <th scope="col">Phone</th>
      <th  scope="col">Action</th>      
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($config as $con)
      <td>{{$con->admin_email}}</td>
      <td>{{$con->notification_email}}</td>
      <td>{{$con->phone_no}}</td>
    


      <td><a href="/configuration/{{$con->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a> &nbsp &nbsp 
     </td>
    </tr>
@endforeach
   
  </tbody>
</table>   
             
     </div>
   </div>
</div>
</div>
</section>
</div>
@stop