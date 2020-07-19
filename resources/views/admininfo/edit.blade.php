@extends('layout.master')
@section('title')
Modify Admin Detail
@endsection
@section('barcum')
<h1>
    Edit Admin Info
    <small>Modify Admin Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom')}}"><i class="fa fa-cogs"></i> Admin Info</a></li>
    <li><a href="{{url('admin-ecom/customer')}}">Admin Setting</a></li>
    <li><a href="#" class="active">Modify Admin</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/Admin-Info-update')}}">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $data->id ?>" />
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" value="<?= $data->name ?>" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
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
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/Admin-Info')}}"><i class="fa fa-table"></i> Back To List</a>
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
