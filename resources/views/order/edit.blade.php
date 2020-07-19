@extends('layout.master')
@section('title')
Modify Product Info
@endsection
@section('barcum')
<h1>
    Edit Product Info
    <small>Modify Product Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom')}}"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="{{url('admin-ecom/product')}}">Product Info</a></li>
    <li><a href="#" class="active">Modify Product</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/product-update')}}">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $data->id ?>" />
                    <input type="hidden" name="eximage" value="<?= $data->photo ?>" />



                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Code</label>
                        <input type="text" value="<?= $data->pcode ?>" class="form-control" id="exampleInputEmail1" name="pcode" placeholder="Enter Code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" value="<?= $data->name ?>" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> New Price</label>
                        <input type="text" class="form-control" value="<?= $data->price ?>" id="exampleInputEmail1" name="price" placeholder="Enter New Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Price <code>Used to give discount</code></label>
                        <input type="text" value="<?= $data->old_price ?>" class="form-control" id="exampleInputEmail1" name="old_price" placeholder="Enter Old Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Category </label>
                        <select class="form-control" id="cid" name="cid">
                            <option value="0">Select Category</option>
                            @if(!empty($cat))
                                @foreach($cat as $ct)
                                    <option 
                                        @if($ct->id==$data->cid)
                                            selected="selected" 
                                        @endif
                                        value="<?= $ct->id ?>"><?= $ct->name ?></option>
                                @endforeach
                            @endif

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Sub-Category </label>
                        <select class="form-control" id="subcid" name="scid">
                            <option value="0">Please Select</option>
                            @if(!empty($subcat))
                            @foreach($subcat as $ct)
                            <option 
                                @if($ct->id==$data->scid)
                                    selected="selected" 
                                @endif 
                                value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    
                   
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Tag </label>
                        <select id="tid" name="tid[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                            @if(!empty($tag))
                            @foreach($tag as $ct)
                            <option 
                                @if(in_array($ct->id,$pt))
                                    selected="selected" 
                                @endif   
                                value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Brand </label>
                        <select class="form-control" id="bid" name="bid">
                            <option value="0">Select Brand</option>
                            @if(!empty($brand))
                            @foreach($brand as $ct)
                            <option 
                            @if($ct->id==$data->bid)
                                selected="selected" 
                            @endif     
                            value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            @endforeach
                            @endif

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Brand Image</label>
                        <input type="file" class="form-control" id="brandimage" name="brandimage" placeholder="Enter Name">
                    </div>
                    @if(!empty($data->photo))
                    <div class="form-group">
                        <img height="200" src="{{url('upload/product')}}/<?= $data->photo ?>">
                    </div> 
                    @endif

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"><?=$data->description ?></textarea>
                    </div>


                    <div class="form-group">

                        <input type="checkbox"
                               @if(!empty($data->isactive))
                               checked="checked"  
                               @endif
                               class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/product')}}"><i class="fa fa-table"></i> Back To List</a>
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
<script>
    $(document).ready(function () {
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

                $.post("../product-filter-subcat-data", {'cid': cid, '_token': '<?php echo csrf_token(); ?>'}, function (cdata) {
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
