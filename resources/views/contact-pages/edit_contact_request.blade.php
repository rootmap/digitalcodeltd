@extends('layout.master')
@section('title')
Modify Contact Pages Info
@endsection
@section('barcum')
<h1>
    Edit Contact Pages Info
    <small>Modify Contact Pages Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom/slider')}}">Contact Pages Info</a></li>
    <li><a href="#" class="active">Modify Contact Pages</a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Contact Pages</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/Contact-Request-message')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="box-body">
                    <div class="form-group">
                        
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" @if(isset($data)) value="<?= $data->name; ?>" @endif>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" @if(isset($data)) value="<?= $data->email; ?>" @endif>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter Email" @if(isset($data)) value="<?= $data->phone; ?>" @endif>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Message</label>
                        <textarea class="form-control" name="message" placeholder="Enter Description">@if(isset($data)) <?= $data->message; ?>@endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Reply Message</label>
                        <textarea class="form-control" name="remessage" placeholder="Enter Message"></textarea>
                    </div>
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/contact-request')}}"><i class="fa fa-table"></i> Back To List</a>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>


<!-- /.row -->
<!-- /.content -->
@endsection

@section('css')
<link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

    });
</script>    
@endsection
