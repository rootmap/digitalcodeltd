@extends('layout.master')
@section('title')
New Customer Info
@endsection
@section('barcum')
<h1>
    New Customer Info
    <small>Create New Customer Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Customer Info</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Customer Setting</a></li>
    <li><a href="#" class="active">Create New Customer</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/customer-add')}}">
                <div class="box-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Gender </label>
                        <select class="form-control" id="sex" name="sex">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Date of Birth</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="dob" placeholder="Enter Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter Phone/Mobile No.">
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Enter Password">
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
<link rel="stylesheet" href="{{url('plugins/select2/select2.min.css')}}">
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{url('plugins/select2/select2.full.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
//$("#brandimage").kendoUpload();
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

                $.post("./product-filter-subcat-data", {'cid': cid, '_token': '<?php echo csrf_token(); ?>'}, function (cdata) {
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