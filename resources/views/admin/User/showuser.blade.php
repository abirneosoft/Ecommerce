@extends('admin.master')
@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>USER </h1>
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
                
              <h3 class="card-title bg-info  h-100 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)"> 
            <a class="btn btn-success" href="/export_user_pdf">Export to PDF</a>
            </h3>
            <a class="btn btn-success" href="/view_user_pdf" target="_blank">VIEW PDF</a>

                <a href="/users/create" class="btn btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i>User</a>
              </div>
              <div class="d-flex justify-content-end mb-4">
            
        </div>
              <table class="table">
  <thead>
    <tr>
      
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">status</th>
          
    </tr>
  </thead>
  <tbody>
    <tr scope="row">
      @foreach($user as $u)
      <td>{{$u->first_name}}</td>
      <td>{{$u->last_name}}</td>
      <td>{{$u->email}}</td>
      <td>{{$u->status}}</td>
      
      
      

      <td><a href="/users/{{$u->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a> &nbsp &nbsp </td>
    </tr>

   @endforeach
   
  </tbody>
</table>
     {{$user->links("pagination::bootstrap-4")}} 
   
     </div>
   </div>
</div>
</div>
</section>
</div>
<!-- <style>
  .w-5{
    display:none;
  }
</style> -->
@stop