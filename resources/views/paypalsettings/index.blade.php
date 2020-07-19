@extends('layout.master')
@section('title')
Pyapal Settings Info
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
                <h3 class="box-title"><i class="fa fa-plus"></i> 
                    @if(isset($edit))
                    Change Pyapal Settings
                    @else
                    Create New Pyapal Settings
                    @endif
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(isset($edit))
                <form method="post" role="form" action="{{url('admin-ecom/paypalsetting-update')}}">
            @else
                <form method="post" role="form" action="{{url('admin-ecom/paypalsetting-add')}}">
            @endif
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">PAYPAL CLIENT ID</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="paypal_client_id" 
                        @if(isset($edit))
                            value="{{$edit->paypal_client_id}}" 
                        @endif 
                         placeholder="Enter PAYPAL CLIENT ID">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">PAYPAL SECRET</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="paypal_secret" 
                        @if(isset($edit))
                            value="{{$edit->paypal_secret}}" 
                        @endif 
                         placeholder="Enter PAYPAL SECRET">
                    </div>
                    
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">

                        <input type="checkbox"  class="minimal"  name="paypal_status" 
                        @if(isset($edit))
                            @if($edit->paypal_status=="Active")
                                checked="checked" 
                            @endif 
                        @endif 
                        placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    @if(isset($edit))
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button> 
                    @else
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button> 
                    @endif
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>
<!-- /.content -->
@endsection


@section('css')
<link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    });

</script>

@endsection