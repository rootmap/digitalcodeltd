@extends('layout.master')
@section('title')
    @if(isset($edit))
        Edit Discount Info
    @else
        New Discount Info
    @endif
@endsection
@section('barcum')

@if(isset($edit))
    <h1>
        Edit Discount Info
        <small>Edit Discount Info</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tags"></i> Discount Info</a></li>
        <li><a href="#"><i class="fa fa-tags"></i> Discount Setting</a></li>
        <li><a href="#" class="active">Edit Discount</a></li>
    </ol>
@else
    <h1>
        New Discount Info
        <small>Create New Discount Info</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tags"></i> Discount Info</a></li>
        <li><a href="#"><i class="fa fa-tags"></i> Discount Setting</a></li>
        <li><a href="#" class="active">Create New Discount</a></li>
    </ol>
@endif
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
                @if(isset($edit))
                    <h3 class="box-title"><i class="fa fa-plus"></i> Change Discount Info</h3>
                @else
                    <h3 class="box-title"><i class="fa fa-plus"></i> Create New Discount</h3>
                @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(isset($edit))
            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/discount-update/'.$edit->id)}}">
            @else
            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/discount-add')}}">
            @endif
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Minimum Discount </label>
                            <input type="number" class="form-control number" id="exampleInputEmail1" name="minimum_amount" 
                            @if(isset($edit))
                                value="{{$edit->minimum_amount}}" 
                            @else
                                value="0" 
                            @endif 
                            placeholder="Enter Minimum Discount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Discount Category </label>
                            <select class="form-control" id="discount_option" name="discount_option">
                                <option value="">Select Category</option>
                                <option 
                                @if(isset($edit))
                                    @if($edit->discount_option=="Common")
                                        selected="selected" 
                                    @endif 
                                @endif 
                                value="Common">Common</option>
                                <option 
                                @if(isset($edit))
                                    @if($edit->discount_option=="Order Online")
                                        selected="selected" 
                                    @endif 
                                @endif 
                                value="Order Online">Order Online</option>                    
                                <option 
                                @if(isset($edit))
                                    @if($edit->discount_option=="Delivery")
                                        selected="selected" 
                                    @endif 
                                @endif 
                                value="Delivery">Delivery</option>
                                <option 
                                @if(isset($edit))
                                    @if($edit->discount_option=="Collection")
                                        selected="selected" 
                                    @endif 
                                @endif 
                                value="Collection">Collection</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Discount Amount Type </label>
                            <select class="form-control" id="discount_type" name="discount_type">
                                <option value="">Select Amount Type</option>
                                <option 
                                @if(isset($edit))
                                    @if($edit->discount_type=="Fixed")
                                        selected="selected" 
                                    @endif 
                                @endif 
                                value="Fixed">Fixed</option>
                                <option 
                                @if(isset($edit))
                                    @if($edit->discount_type=="Percentage")
                                        selected="selected" 
                                    @endif 
                                @endif 
                                value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Discount Amount</label>
                            <input type="number" class="form-control number" id="exampleInputEmail1" name="discount_amount" 
                            @if(isset($edit))
                                value="{{$edit->discount_amount}}" 
                            @else
                                value="0" 
                            @endif  
                            placeholder="Enter Discount Amount">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                            @if(isset($edit))
                                value="{{$edit->message}}" 
                            @endif  
                             name="message" placeholder="Enter Message">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="checkbox" class="minimal"  name="discount_status" 
                            @if(isset($edit))
                                @if($edit->discount_status=="Active")
                                    checked="checked"
                                @endif
                            @endif  
                            placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                        </div>
                    </div>
                    
                    {{csrf_field()}}
                    

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    @if(isset($edit))
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save Changes</button> 
                    <a type="reset" href="{{url('admin-ecom/discount')}}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Back To List</a>
                    @else
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    @endif
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

        $(".number").keyup(function(){
            var val=$(this).val();
            var retData=val;
            if(parseFloat(val)<0)
            {
                retData=0;
            }

            $(this).val(retData);
        });

        $(".number").change(function(){
            var val=$(this).val();
            var retData=val;
            if(parseFloat(val)<0)
            {
                retData=0;
            }

            $(this).val(retData);
        });

    });
</script>    
@endsection