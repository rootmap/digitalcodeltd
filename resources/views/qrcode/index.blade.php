@extends('layout.master')

@section('title')

QRCode Info

@endsection

@section('barcum')

<h1>

    QRCode Info

    <small>QRCode</small>

</h1>

<ol class="breadcrumb">

    <li><a href="#" class="active">QRCode Info</a></li>

</ol>

@endsection



@include('extra.msg')



@section('content')

@if(isset($data))

<div class="row">

    <!-- left column -->

    <div class="col-md-12">

        <!-- general form elements -->

        <div class="box box-danger">

            <div class="box-header with-border">

                <h3 class="box-title"><i class="fa fa-plus"></i> Change QRCode</h3>

            </div>

            <!-- /.box-header -->

            <!-- form start -->



            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/qrcode-update')}}">

                <div class="box-body">



                    

                    <input type="hidden" name="id" value="<?= $data->id ?>" />

                    <input type="hidden" name="exqrcode" value="<?= $data->qrcode ?>" />

                    <div class="form-group">

                        <label for="exampleInputEmail1">QRCode Section Title</label>

                        <input type="text" value="<?= $data->qrcode_section_title ?>" class="form-control" id="qrcode_section_title" name="qrcode_section_title" placeholder="Enter Section Title">

                    </div> 

                    <div class="form-group">

                        <label for="exampleInputEmail1">QRCode Link</label>

                        <input type="text" value="<?= $data->qrcode_link ?>" class="form-control" id="qrcode_link" name="qrcode_link" placeholder="Enter Link">

                    </div> 

                    <div class="form-group">

                        <label for="exampleInputEmail1">Change QRCode Image</label>

                        <input type="file" class="form-control" id="qrcode" name="qrcode" placeholder="Enter Name">

                    </div>  

                    

                    @if(!empty($data->qrcode))

                    <div class="form-group">

                        <img height="200" src="{{url('upload/qrcode')}}/<?= $data->qrcode ?>">

                    </div> 

                    @endif

                  


                    

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    

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

@else

<!-- Main content -->

<div class="row">

    <!-- left column -->

    <div class="col-md-12">

        <!-- general form elements -->

        <div class="box box-danger">

            <div class="box-header with-border">

                <h3 class="box-title"><i class="fa fa-plus"></i> Upload New QRCode</h3>

            </div>

            <!-- /.box-header -->

            <!-- form start -->



            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/qrcode-add')}}">

                <div class="box-body">



                    

                    
                    <div class="form-group">

                        <label for="exampleInputEmail1">QRCode Section Title</label>

                        <input type="text" class="form-control" id="qrcode_section_title" name="qrcode_section_title" placeholder="Enter Section Title">

                    </div>  
                    <div class="form-group">

                        <label for="exampleInputEmail1">QRCode Image</label>

                        <input type="file" class="form-control" id="qrcode" name="qrcode" placeholder="Enter Name">

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

        <!-- /.box -->



    </div>

    <!--/.col (left) -->

</div>

@endif



<!-- /.row -->

<!-- /.content -->

@endsection

