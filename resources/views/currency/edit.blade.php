@extends('layout.master')
@section('title')
Modify Currency Info
@endsection
@section('barcum')
<h1>
    Edit Currency Info
    <small>Modify Currency Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom')}}"><i class="fa fa-cogs"></i> Site Setting</a></li>
    <li><a href="{{url('admin-ecom/currency')}}">Currency Info</a></li>
    <li><a href="#" class="active">Modify Currency</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Currency</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" action="{{url('admin-ecom/currency-update')}}">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $data->id ?>" />
                        <label for="exampleInputEmail1">Currency Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Currency Code</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="short_code" placeholder="Enter CODE" value="<?= $data->short_code ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Currency Icon</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="icon" placeholder="Enter ICON" value="<?= $data->icon ?>">
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">

                        <input type="checkbox" 
                               class="minimal"  name="isactive" placeholder="Enter Name"
                               @if(!empty($data->isactive))
                               checked="checked"  
                               @endif
                               > <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/currency')}}"><i class="fa fa-table"></i> Back To List</a>
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