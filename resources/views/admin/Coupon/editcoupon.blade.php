@extends('admin.master')
@section('content')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>COUPON</h1>
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
                <h3 class="card-title">Coupon Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/coupon/{{$coup->id}}" enctype="multipart/form-data">
               @csrf() 
              @method('put')

                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Coupon code </label>
                <div class="col-md-4">

                <input type="text" class="form-control" name="code" value="{{$coup->code}}" />
                @if($errors->has('code'))
                <label class="alert alert-danger" >{{$errors->first('code')}}</label>
                 @endif
               </div>
              </div>

               <div class="form-group">
                  <label class="col-md-4 control-label">Coupon Type</label>
                 <div class="col-md-4">

                  <select class="form-control" wire:model="type" name="type">
                      <option value="{{$coup->type}}" >{{$coup->type}}</option>
                      <option value="fixed">Fixed</option>
                      <option value="percent">Percent</option>
                    </select>
                 @if($errors->has('type'))
                <label class="alert alert-danger" >{{$errors->first('type')}}</label>
                 @endif           
                  </div>   
                </div>

                <div class="form-group">
                <label class="col-md-4 control-label">Coupon Value</label>
                 <div class="col-md-4">
                 <input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value" name="value"  value="{{$coup->value}}"/>                                    
                 @if($errors->has('value'))
                <label class="alert alert-danger" >{{$errors->first('value')}}</label>
                 @endif   
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Coupon status</label>
                 <div class="col-md-4">

                  <select class="form-control" wire:model="status"  name="status">
                      <option value="{{$coup->status}}" >{{$coup->status}}</option>

                      <option value="active">active</option>
                      <option value="inactive">inactive</option>
                    </select>
                 @if($errors->has('status'))
                <label class="alert alert-danger" >{{$errors->first('status')}}</label>
                 @endif              
                </div>
            </div>
        <input type="submit" value="Submit" class="btn btn-success"/>
        </form>
     </div>
   </div>
</div>
</div>
</section>
</div>
@stop