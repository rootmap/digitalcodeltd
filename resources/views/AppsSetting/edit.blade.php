@extends('layout.master')
@section('title')
Modify Apps Setting Info
@endsection
@section('barcum')
<h1>
    Edit Apps Setting Info
    <small>Modify Apps Setting Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom/slider')}}">Apps Setting Info</a></li>
    <li><a href="#" class="active">Modify Apps Setting</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Apps Setting</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/apps-setting-update')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $data->id ?>" />
                    <input type="hidden" name="eximage" value="<?= $data->images ?>" />

                    <div class="form-group">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" class="form-control" id="image" name="link" placeholder="Enter Name" value="<?= $data->link ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" id="image" name="images" placeholder="Enter Name">
                    </div>
                    @if(!empty($data->images))
                    <div class="form-group">
                        <img height="200" src="{{url('upload/AppsSetting')}}/<?= $data->images ?>">
                    </div> 
                    @endif
                    <div class="form-group">
                        <label for="exampleInputPassword1">
                        <input type="checkbox"
                               @if(!empty($data->isactive))
                               checked="checked"  
                               @endif
                               class="minimal"  name="isactive" placeholder="Enter Name">   <span style="margin-left: 5px;">Is Active</span> </label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/apps-setting')}}"><i class="fa fa-table"></i> Back To List</a>
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
