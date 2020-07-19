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

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/Contact-Pages-update')}}">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $data->id ?>" />
                        <input type="hidden" name="eximage" value="<?= $data->sliderimage ?>" />
                        <label for="exampleInputEmail1">Pages Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Page Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="heading" placeholder="Enter Heading" value="<?= $data->heading ?>">
                    </div>
                    
                    

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"><?= $data->description ?></textarea>
                    </div>
                    <div class="form-group">

                        <input type="checkbox"
                               @if(!empty($data->sliderimage))
                               checked="checked"  
                               @endif
                               class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/Contact-Pages')}}"><i class="fa fa-table"></i> Back To List</a>
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
