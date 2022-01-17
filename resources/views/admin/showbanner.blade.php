@extends('admin.master')
@section('content')
<section class="content-wrapper">
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

      <td><a href="/banner/{{$b->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a> &nbsp &nbsp
      <form action="/banner/{{$b->id}}/" method="post">
 @csrf()
 @method('delete')
<button type="submit" onclick="return confirm('Do you really want to delete {{$b->title}}!')" class="btn btn-danger">
  DELETE
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

@stop