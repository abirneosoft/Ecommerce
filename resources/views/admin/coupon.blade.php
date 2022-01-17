@extends('admin.master')
@section('content')
<section class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Coupon Management</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="/coupon" enctype="multipart/form-data">
               @csrf()    
                @if(Session::has('errMsg'))
               <div class="alert alert-danger">{{Session::get('errMsg')}}</div>
                 @endif
                <div class="form-group">
                <label>Coupon code </label>
                <div class="col-md-4">
              
                <input type="text" class="form-control" name="code"  />
                @if($errors->has('code'))
                <label class="alert alert-danger" >{{$errors->first('code')}}</label>
                 @endif
               </div>
              </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">Coupon Type</label>
                 <div class="col-md-4">

                  <select class="form-control" wire:model="type" name="type">
                      <option value=""></option>
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
                 <input type="text" placeholder="Coupon Value" class="form-control input-md" wire:model="value" name="value" />                                    
                 @if($errors->has('value'))
                <label class="alert alert-danger" >{{$errors->first('value')}}</label>
                 @endif   
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Coupon status</label>
                 <div class="col-md-4">

                  <select class="form-control" wire:model="status" name="status">
                      <option value=""></option>

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

@stop