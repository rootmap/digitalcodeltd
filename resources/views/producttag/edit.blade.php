@extends('layout.master')
@section('title')
Modify Tag in Product Info
@endsection
@section('barcum')
<h1>
    Edit Tag in Product Info
    <small>Modify Tag in Product Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom')}}"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="{{url('admin-ecom/product-tag')}}">Tag in Product Info</a></li>
    <li><a href="#" class="active">Modify Tag in Product Info</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Tag in Product Info</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" action="{{url('admin-ecom/product-tag-update')}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Product </label>
                        <select class="form-control" id="exampleInputEmail1" name="product_id">
                            <option value="0">Select Product</option>
                            @if(!empty($product))
                                @foreach($product as $ct)
                                <option <?php if($ct->id==$data->pid){ ?> selected="selected" <?php } ?> value="<?= $ct->id ?>"><?= $ct->name ?></option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Tag</label>
                        <select class="form-control" id="exampleInputEmail1" name="tid">
                            <option value="0">Select Tag</option>
                            @if(!empty($tag))
                                @foreach($tag as $ct)
                                    <option <?php if($ct->id==$data->tid){ ?> selected="selected" <?php } ?> value="<?= $ct->id ?>"><?= $ct->name ?></option>
                                @endforeach
                            @endif
                            
                        </select>
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/sub-category')}}"><i class="fa fa-table"></i> Back To List</a>
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

