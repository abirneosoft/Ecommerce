@extends('admin.master')
@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PRODUCT </h1>
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
                <h3 class="card-title">product Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/user/postpro_manage" enctype="multipart/form-data">
               @csrf()    
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Product Name </label>
                <input type="text" class="form-control" name="name" />
                @if($errors->has('name'))
                <label class="alert alert-danger" >{{$errors->first('name')}}</label>
                 @endif
              </div>
              <div class="form-group">
                <label>Descriptionn</label>
                <textarea name="description" class="form-control"></textarea>
                 @if($errors->has('description'))
                 <label class="alert alert-danger" >{{$errors->first('description')}}</label>
                 @endif
              </div>
              <div class="form-group">
                <label>Quantity </label>
                <input type="text" class="form-control" name="quantity" />
                @if($errors->has('quantity'))
                <label class="alert alert-danger" >{{$errors->first('quantity')}}</label>
                 @endif
              </div>
             
              <div class="form-group">
                <label>Price </label>
                <input type="number" class="form-control" name="price" />
                @if($errors->has('price'))
                <label class="alert alert-danger" >{{$errors->first('price')}}</label>
                 @endif
              </div>
              <div class="form-group">
                <label>selling Price </label>
                <input type="number" class="form-control" name="sale_price" />
                @if($errors->has('sale_price'))
                <label class="alert alert-danger" >{{$errors->first('sale_price')}}</label>
                 @endif
              </div>
            <hr><hr>
            <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Product category</h3>
              </div>
            <div class="card-body">
                
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label for="category_name">category name</label>

                 <select name="cname">
                  <option></option>
                     @foreach($cat as $c)
                     <option value="{{$c->id}}">{{$c->category_name}}</option>
                    @endforeach
                </select>
                @if($errors->has('cname'))
                <label class="alert alert-danger" >{{$errors->first('cname')}}</label>
                 @endif
                </div>
              <div>      
            <label for="product_name">Product name</label>
            <select name="pname">
             <option></option>
           @foreach($pro as $p)
             <option value="{{$p->id}}">{{$p->product_name}}</option>
             @endforeach
           </select>
           @if($errors->has('pname'))
                <label class="alert alert-danger" >{{$errors->first('pname')}}</label>
                 @endif
            </div>
            
         </div>

         <div class="card card-primary">
              <div class="card-header">
             <h3 class="card-title">Product image</h3>
             </div>
                <div class="card-body">
                  <div class="form-group">
                <label>Product image </label> <br>
                <input type="file" class="form-contol" name="file"/> <br><br>
                 @if($errors->has('file'))
                <label class="alert alert-danger" > {{$errors->first('file')}} </label>
                 @endif   
                </div>
                <div class="form-group">
                <label for="product_name">Product name</label>
            <select name="pname">
             <option></option>
             @foreach($pro as $p)
             <option value="{{$p->id}}">{{$p->product_name}}</option>
            @endforeach
           </select>
           @if($errors->has('pname'))
                <label class="alert alert-danger" >{{$errors->first('pname')}}</label>
                 @endif
            
                </div>
                </div>     
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

         <div class="card card-primary">
           
            <div class="card-header">
                <h3 class="card-title">Product attribute</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
               <div class="form-group">
                <label>Quantity </label>
                <input type="text" class="form-control" name="quantity" />
                @if($errors->has('quantity'))
                <label class="alert alert-danger" >{{$errors->first('quantity')}}</label>
                 @endif
              </div>
             
              <div class="form-group">
                <label>Price </label>
                <input type="number" class="form-control" name="price" />
                @if($errors->has('price'))
                <label class="alert alert-danger" >{{$errors->first('price')}}</label>
                 @endif
              </div>
         <div class="form-group">      
            <label for="product_name">Product name</label>
            <select name="pname">
             <option></option>
             @foreach($pro as $p)
             <option value="{{$p->id}}">{{$p->product_name}}</option>
            @endforeach
           </select>
           @if($errors->has('pname'))
                <label class="alert alert-danger" >{{$errors->first('pname')}}</label>
                 @endif
            </div>
            
            <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-success"/>

            </div>  
        </form>

                </div>
              </div>
              <!-- /.card-body -->
            </div>
           
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
    @stop