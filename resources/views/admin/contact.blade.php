@extends('admin.master')
@section('content')
<section class="content-wrapper">
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

@stop