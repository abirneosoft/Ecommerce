@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title bg-info  h-100 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)"> &nbsp;&nbsp; SHOW PRODUCT</h3>
              <a href="/product_manage/create" class="btn btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;ADD</a>
             
            </div>
              <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Product Name</th>
      <th scope="col">description</th>
      <th scope="col">quantity</th>
      <th scope="col">Price</th>
      <th  scope="col">sale price</th>    
      <th  scope="col">Action</th>    
        
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($pro as $p)
      <td>{{$p->product_name}}</td>
      <td>{{$p->description}}</td>
      <td>{{$p->quantity}}</td>
      <td>{{$p->price}}</td>
      <td>{{$p->sale_price}}</td>
      

      <td><a href="/product_manage/{{$p->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a> &nbsp &nbsp 
      <form action="/product_manage/{{$p->id}}/" method="post">
         @csrf()
         @method('delete')
       <button type="submit" onclick="return confirm('Do you really want to delete!')" class="btn btn-danger">
        DELETE
       </button>
         </form>
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

@stop