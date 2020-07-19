@extends('layout.master')
@section('title')
Modify Brand Info
@endsection
@section('barcum')
<h1>
    Edit Brand Info
    <small>Modify Brand Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom')}}"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="{{url('admin-ecom/brand')}}">Brand Info</a></li>
    <li><a href="#" class="active">Modify Brand</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Brand</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/brand-update')}}">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $data->id ?>" />
                        <input type="hidden" name="eximage" value="<?= $data->brandimage ?>" />
                        <input type="hidden" name="eximage_logo" value="<?= $data->brandlogo ?>" />
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" class="form-control" id="brandimage" name="brandimage" placeholder="Enter Name">
                    </div>
                    
                    @if(!empty($data->brandimage))
                    <div class="form-group">
                        <img height="200" src="{{url('upload/brand')}}/<?= $data->brandimage ?>">
                    </div> 
                    @endif
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Logo</label>
                        <input type="file" class="form-control" id="brandlogo" name="brandlogo" placeholder="Enter Name">
                    </div>
                    
                    @if(!empty($data->brandlogo))
                    <div class="form-group">
                        <img height="200" src="{{url('upload/brand')}}/<?= $data->brandlogo ?>">
                    </div> 
                    @endif

                    <div class="form-group iscustomlayout">
                        <input type="checkbox" 
                        @if(!empty($data->is_custom_layout))
                            checked="checked"
                        @endif
                          class="minimal" id="is_custom_layout" name="is_custom_layout" value="1"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Custom Layout</label>
                    </div>
                    <div class="form-group customlayout">
                        <label for="exampleInputPassword1">Please Choose a Brand Layout</label>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" 
                                        @if($data->layout==1)
                                            checked="checked"
                                        @endif
                                        value="1" name="layout" id="layout_0" /> Layout One</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img src="{{url('brand_layout/branddiagrampr.jpg')}}" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input 
                                        @if($data->layout==2)
                                            checked="checked"
                                        @endif
                                        type="radio" name="layout" value="2" id="layout_1" /> Layout Two</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130"  src="{{url('brand_layout/branddiagram.jpg')}}" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input 
                                        @if($data->layout==3)
                                            checked="checked"
                                        @endif
                                        type="radio" name="layout" value="3" id="layout_2" /> Layout Three</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130" src="{{url('brand_layout/branddiagramsubsub.jpg')}}" />
                                    </div>
                                </label>
                            </div>
                            
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"><?= $data->description ?></textarea>
                    </div>
                    <div class="form-group">

                        <input type="checkbox"
                               @if(!empty($data->brandimage))
                                checked="checked"  
                               @endif
                               class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/brand')}}"><i class="fa fa-table"></i> Back To List</a>
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

        $(".customlayout").fadeOut();

        @if(!empty($data->is_custom_layout))
            $(".customlayout").fadeIn();
        @endif

            $(".iscustomlayout .iCheck-helper").click(function () {
                var colorAc = $(this).parent('div').attr('aria-checked');
                //alert(colorAc);        
                if (colorAc == 'true')
                {
                    $(".customlayout").fadeIn();
                } else
                {
                    $(".customlayout").fadeOut();
                }
        });

    });
</script>    
@endsection
