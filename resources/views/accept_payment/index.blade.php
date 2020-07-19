@extends('layout.master')
@section('title')
Accept Payment Info
@endsection
@section('barcum')
<h1>
    Accept Payment
    <small>Accept Payment</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active">Accept Payment Info</a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
@if(isset($data))
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Change Accept Payment</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/accept-payment-update')}}">
                <div class="box-body">

                    <input type="hidden" name="id" value="<?= $data->id ?>" />
                    <input type="hidden" name="exqrcode" value="<?= $data->images ?>" />

                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Title</label>
                        <input type="text" class="form-control" value="{{$data->title}}" id="title" name="title" placeholder="Enter title">
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Name">
                    </div>  
                    
                    @if(!empty($data->images))
                    <div class="form-group">
                        <img height="200" src="{{url('upload/AcceptPayment')}}/<?= $data->images ?>">
                    </div> 
                    @endif

                     <div class="form-group">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" class="form-control" value="{{$data->title_link}}" id="title_link" name="title_link" placeholder="Enter Link">
                    </div> 

                    <input type="hidden" class="form-control" value="{{$data->images}}" id="eximages" name="eximages" placeholder="Enter title">
              
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>
@else
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Upload New Accept Payment</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/accept-payment-add')}}">
                <div class="box-body">

                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control"  id="title" name="title" placeholder="Enter title">
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Accept Payment Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Name">
                    </div>  
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>
@endif

<!-- /.row -->
<!-- /.content -->
@endsection
