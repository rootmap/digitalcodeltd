@extends('layout.master')
@section('title')
Modify Order Contant
@endsection
@section('barcum')
<h1>
    Edit Order Contant
    <small>Modify Order Contant</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom/orderInfo')}}">Payment Order Contant</a></li>
    <li><a href="#" class="active">Modify Order Contant</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Order Contant</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/orderInfo-update')}}">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $data->id; ?>" />
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Delivery Time</label>
                        <textarea class="form-control"  name="delivery_time" placeholder="Enter Delivery Time"><?= $data->delivery_time; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Allergy Alert</label>
                        <textarea class="form-control"  name="allergy_alert" placeholder="Enter Allergy Alert"><?= $data->allergy_alert; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Delivery Info</label>
                        <textarea class="form-control"  name="delivery_info" placeholder="Enter Delivery Info"><?= $data->delivery_info; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control"  name="description" placeholder="Enter Description"><?= $data->description; ?></textarea>
                    </div>
                    <div class="form-group">

                        <input type="checkbox"
                               @if(!empty($data->isactive))
                               checked="checked"  
                               @endif
                               class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/order-Info')}}"><i class="fa fa-table"></i> Back To List</a>
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
@include('extra.kendo')
<script>
    $(document).ready(function () {

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

    });
</script>
<script>
    $(document).ready(function () {
        function onPaste(e) {
            kendoConsole.log("paste :: " + kendo.htmlEncode(e.html));
        }
        // create DateTimePicker from input HTML element
        $("#datepicker").kendoDatePicker({
            value: new Date(),
            dateInput: true
        });
        $("#timepicker").kendoTimePicker({
            value: new Date(),
            dateInput: true
        });
        $("#editor").kendoEditor({ resizable: {
            content: true,
            toolbar: true,
            paste: onPaste
        }});
    });
</script>   
@endsection
