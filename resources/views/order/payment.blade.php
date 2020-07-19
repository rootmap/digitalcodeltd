@extends('layout.master')
@section('title')
Payment Info
@endsection
@section('barcum')
<h1>
    Payment Info
    <small>Make New Payment Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Order Info</a></li>
    <li><a href="#" class="active">Create New Payment</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Payment</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/payment-request')}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Order Amount</label>
                        <input type="text" value="<?= $order[0]; ?>" class="form-control" id="exampleInputEmail1" name="amount" readonly="readonly" placeholder="Enter Amount">
                    </div>
                    <input type="hidden" value="<?= $order[1] ?>" name="oid"/>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Payment Method </label>
                        <select class="form-control" id="pm" name="pm">
                            <option value="0">Select Payment Method</option>
                            @if(!empty($pm))
                            @foreach($pm as $ct)
                            <option value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif

                        </select>
                    </div><input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Paid Amount</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="paid" placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Order Status</label>
                        <select class="form-control" name="os">
                            <option value="0">Select Order Status</option>
                            <option value="Paid">Paid</option>
                            <option value="Pending">Pending</option>
                            <option value="Cancel">Cancel</option>
                            
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit Payment</button> 
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