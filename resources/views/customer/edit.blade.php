@extends('layout.master')
@section('title')
Modify Customer Detail
@endsection
@section('barcum')
<h1>
    Edit Customer Info
    <small>Modify Customer Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom')}}"><i class="fa fa-cogs"></i> Customer Info</a></li>
    <li><a href="{{url('admin-ecom/customer')}}">Customer Setting</a></li>
    <li><a href="#" class="active">Modify Customer</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/customer-update')}}">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $data->id ?>" />
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" value="<?= $data->name ?>" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Gender </label>
                        <select class="form-control" id="sex" name="sex">
                            <option value="0">Select Gender</option>

                                    <option 
                                        @if($data->sex=="Male")
                                            selected="selected" 
                                        @endif
                                        value="Male">Male</option>
                                    <option 
                                        @if($data->sex=="Female")
                                            selected="selected" 
                                        @endif
                                        value="Female">Female</option>
                              

                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Date of Birth</label>
                        <input type="text"  value="<?= $data->dob ?>" class="form-control" id="exampleInputEmail1" name="dob" placeholder="Enter Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" value="<?= $data->phone ?>" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter Phone/Mobile No.">
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Email Address</label>
                        <input type="email"  value="<?= $data->email ?>" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password"  value="<?= $data->password ?>" class="form-control" id="exampleInputEmail1" name="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Type</label>
                        <select class="form-control" name="user_type">
                            <option value="">Select User Type</option>
                            <option 
                                @if($data->user_type=="Customer")
                                    selected="selected" 
                                @endif 
                                value="Customer">Customer</option>
                            <option 
                                @if($data->user_type=="Customer")
                                    selected="selected" 
                                @endif 
                                value="Admin">Admin</option>
                        </select>
                    </div>
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/customer')}}"><i class="fa fa-table"></i> Back To List</a>
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
<link rel="stylesheet" href="{{url('plugins/select2/select2.min.css')}}">
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{url('plugins/select2/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".select2").select2();
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        
        $("#cid").change(function () {
            var cid = $(this).val();
            if (cid == null || cid == 0)
            {
                var loadingscid = '<option value="0">Please Select Category</option>';
                $("#subcid").html(loadingscid);
            } else
            {
                var loadingscid = '<option value="0">Loading Please Wait...</option>';
                $("#subcid").html(loadingscid);

                $.post("../product-filter-subcat-data", {'cid': cid, '_token': '<?php echo csrf_token(); ?>'}, function (cdata) {
                    //console.log(cdata);
                    var loadingscid = '<option value="0">Please Select Sub Category</option>';

                    $.each(cdata, function (index, val) {
                        //console.log(val);
                        loadingscid += '<option value="' + val.id + '">' + val.name + '</option>';
                    });

                    var getlength = cdata.length;
                    //console.log(getlength);
                    if (getlength == 0)
                    {
                        var loadingscid = '<option value="0">Please Select Another Category</option>';
                        $("#subcid").html(loadingscid);
                    } else
                    {
                        $("#subcid").html(loadingscid);
                    }
//                    if(cdata==null)
//                    {
//                        var loadingscid = '<option value="0">Please Select Category</option>';
//                        $("#subcid").html(loadingscid);
//                    }
//                    else
//                    {
//                        $("#subcid").html(cdata);
//                    }
                });
            }
        });

    });
</script>    
@endsection
