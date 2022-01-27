@extends('admin.master')
@section('content')

<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CONTACT</h1>
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
                <h3 class="card-title">Contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Message</th>
      <th scope="col">Email</th>
      <th scope="col">subject</th>
          
    </tr>
  </thead>
  <tbody>
    <tr scope="row">
      @foreach($contact as $u)
      <td>{{$u->name}}</td>
      <td>{{$u->message}}</td>
      <td>{{$u->email}}</td>
      <td>{{$u->subject}}</td>
      
      
      

      
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