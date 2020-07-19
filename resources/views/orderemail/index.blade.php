@extends('layout.master')
@section('title')
Order Email Setting Info
@endsection
@section('barcum')
<h1>
    Order Email Setting Info
    <small>SET Order Email Setting Details</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active"><i class="fa fa-cogs"></i> Order Email Setting </a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">

        <?php
        if (isset($data)) {
            ?>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> Update Order Email Settings Here</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form method="post" role="form" action="{{url('admin-ecom/orders-email-update')}}">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $data[0]->id ?>" />
                            <label for="exampleInputEmail1">Primary Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="primary_email" value="<?=$data[0]->name?>" placeholder="Enter Name / Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Backup Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="backup_email" value="<?=$data[0]->meta?>" placeholder="Enter Meta by separated with comma (,)">
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
            <?php
        } else {
            ?>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> Fillup Order Email Setting Here</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form method="post" role="form" action="{{url('admin-ecom/orders-email-add')}}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Primary Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="primary_email" placeholder="Enter Name / Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Backup Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="backup_email" placeholder="Enter Meta by separated with comma (,)">
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
            <?php
        }
        ?>
        <!-- general form elements -->







        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>


<!-- /.row -->
<!-- /.content -->
@endsection


