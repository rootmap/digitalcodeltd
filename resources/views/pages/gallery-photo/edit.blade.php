@extends('layout.master')
@section('title')
Modify Gallery Photo
@endsection
@section('barcum')
<h1>
    Edit Gallery Photo
    <small>Modify Gallery Photo</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom/orderInfo')}}">Payment Gallery Photo</a></li>
    <li><a href="#" class="active">Modify Gallery Photo</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Gallery Photo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" enctype="multipart/form-data" action="{{url('admin-ecom/gallery-photo-update/'.$data->id)}}">
                <div class="box-body">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="eximage" value="{{$data->photo}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gallery Image</label>
                        <br>
                        @if(isset($data))<img width="30%" src="{{ URL::asset('upload/gallery-photo/'.$data->photo) }}">@endif
                        <input type="file" class="form-control" id="brandimage" name="galleryphoto" placeholder="Enter Name">
                    </div> 
                    <div class="form-group">
                        
                        <input type="checkbox"  class="minimal"
                         @if(isset($data))
                            @if($data->isactive=='1')
                                checked="checked" 
                            @endif
                         @endif
                          name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
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
