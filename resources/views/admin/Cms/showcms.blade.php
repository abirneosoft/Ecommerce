@extends('admin.master')
@section('content')

<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CMS </h1>
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
              <h3 class="card-title bg-info  h-100 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)"> &nbsp;&nbsp; SHOW CMS</h3>
               
              <a href="/cms/create" class="btn btn-success float-right"><i class="fa fa-plus" aria-hidden="true"></i>ADD</a>

              </div>
                 <table>
                     <thead>
                     <tr>
                               <th scope="col">Title</th>
                                <th scope="col"> body</th>
                                <th scope="col"> Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                     </thead>
                     <tbody>
                     <tbody>
                        
                           
                                <tr>
                                @foreach($cmss as $c)
                                    <td>{{$c->title}}</td>
                                    <td>{{$c->body}}</td>
                                    
                                    <td>
                                    <img src="{{url('uploads/'.$c->image)}}" width="50" height="50"><br>
                                    </td>
                                    <td>
                                        <a href="/cms/{{$c->id}}/edit" class="btn   mr-2" ><i class="fas fa-edit"></i></a>

                                        <form action="/cms/{{$c->id}}/" method="post">
                                         @csrf()
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Do you really want to delete!')" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                                             </form>
                                    </td>
                                </tr>
                      @endforeach
                              
                        </tbody>
                     </tbody>
                 </table>
             {{$cmss->links("pagination::bootstrap-4")}}
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