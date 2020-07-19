@extends('layout.master')
@section('title')
Customer Support Info
@endsection
@section('barcum')
<h1>
    Customer Support Info
    <small>SET Website Customer Support Details</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active"><i class="fa fa-cogs"></i> Customer Support Setting</a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">

        @if(isset($data))
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> Update Customer Support Settings Here</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form  enctype="multipart/form-data"  method="post" role="form" action="{{url('admin-ecom/customer-support-update')}}">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $data[0]->id ?>" />
                            <label for="exampleInputEmail1">Customer Support Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_number" value="<?= $data[0]->contact_number ?>" placeholder="Customer Support NO.">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Reservation Admin Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="reservation_email" value="<?= $data[0]->reservation_email ?>" placeholder="Reservation Admin Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Admin Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_admin_email" value="<?= $data[0]->contact_admin_email ?>" placeholder="Contact Admin Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Order Admin Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="order_admin_email" value="<?= $data[0]->order_admin_email ?>" placeholder="Order Admin Email">
                        </div>
                        
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    </div>
                </form>
            </div>
            @else
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> Fillup Customer Support Settings Here</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form   method="post" role="form" action="{{url('admin-ecom/customer-support-add')}}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer Support Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_number" placeholder="Customer Support NO.">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Reservation Admin Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="reservation_email"  placeholder="Reservation Admin Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Admin Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_admin_email" placeholder="Contact Admin Email">
                        </div>
                        


                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create</button> 
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    </div>
                </form>
            </div>
            @endif
        <!-- general form elements -->







        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>


<!-- /.row -->
<!-- /.content -->
@endsection


