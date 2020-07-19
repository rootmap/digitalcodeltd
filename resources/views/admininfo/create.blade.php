@extends('layout.master')
@section('title')
New Admin Info
@endsection
@section('barcum')
<h1>
    New Admin Info
    <small>Create New Admin Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Admin Info</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Admin Setting</a></li>
    <li><a href="#" class="active">Create New Admin</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/Admin-Info-add')}}">
                <div class="box-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
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
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Type</label>
                        <select class="form-control" name="user_type">
                            <option value="">Select User Type</option>
                            <option 
                                value="Customer">Customer</option>
                            <option 
                                value="Admin">Admin</option>
                        </select>
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
