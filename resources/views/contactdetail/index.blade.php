@extends('layout.master')
@section('title')
Contact Detail Info
@endsection
@section('barcum')
<h1>
    Contact Detail Info
    <small>SET Website Contact Detail Details</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active"><i class="fa fa-cogs"></i> Contact Detail Setting</a></li>
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
                    <h3 class="box-title"><i class="fa fa-plus"></i> Update Contact Detail Settings Here</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form  enctype="multipart/form-data"  method="post" role="form" action="{{url('admin-ecom/contact-detail-update')}}">
                    <div class="box-body">
                        
                        <input type="hidden" name="id" value="{{$data[0]->id}}" />
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_title"  value="{{$data[0]->contact_title}}" placeholder="Contact Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_address" value="{{$data[0]->contact_address}}" placeholder="Contact Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Phone/Mobile</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_phone" value="{{$data[0]->contact_phone}}" placeholder="Contact Phone NO.">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_email" value="{{$data[0]->contact_email}}" placeholder="Contact Email Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Terms & Conditions</label>
                            <textarea class="form-control" id="exampleInputEmail1" name="site_terms_condition">{{$data[0]->site_terms_condition}}</textarea>
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
                    <h3 class="box-title"><i class="fa fa-plus"></i> Fillup Contact Detail Settings Here</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form   method="post" role="form" action="{{url('admin-ecom/contact-detail-add')}}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_title" placeholder="Contact Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_address" placeholder="Contact Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Phone/Mobile</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_phone" placeholder="Contact Phone NO.">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="contact_email" placeholder="Contact Email Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Site Terms & Conditions</label>
                            <textarea class="form-control" id="exampleInputEmail1" name="site_terms_condition" placeholder="Site Terms & Condition"></textarea>
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


