@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                
              <h3 class="card-title bg-info  h-100 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)"> &nbsp;&nbsp; SHOW USER</h3>

                <a href="/users/create" class="btn btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i>User</a>
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
      
      
      

      <td><a href="/users/{{$u->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a> &nbsp &nbsp </td>
    </tr>

   @endforeach
   
  </tbody>
</table>
      
  {{$user->links()}}      
     </div>
   </div>
</div>
</div>
</section>
<style>
  .w-5{
    display:none;
  }
</style>
@stop