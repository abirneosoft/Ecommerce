@extends('admin.master')
@section('content')

<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>BANNER </h1>
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
              <h3 class="card-title bg-info  h-100 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)"> &nbsp;&nbsp; SHOW BANNER</h3>
               
                <a href="/banner/create" class="btn btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i>Add</a>

              </div>
              <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Banner Title</th>
      <th scope="col"> Description</th>
      <th scope="col"> Image</th>

      <th scope="col">ACTION</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($ban as $b)
      <td>{{$b->title}}</td>
      <td>{{$b->description}}</td>
      <td><img src="{{url('uploads/'.$b->banner_image)}}" height="80" width="80"/></td>

      <td><a href="/banner/{{$b->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a> &nbsp &nbsp
      <form action="/banner/{{$b->id}}/" method="post">
 @csrf()
 @method('delete')
<button type="submit" onclick="return confirm('Do you really want to delete {{$b->title}}!')" class="btn btn-danger">
<i class="fas fa-trash-alt"></i>
</button>
</form></td>
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