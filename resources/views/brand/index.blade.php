@extends('layout.master')
@section('title')
Brand Info
@endsection
@section('barcum')
<h1>
    Brand Info
    <small>Create Brand & All Brand List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="#" class="active">Brand Info</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Brand</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/brand-add')}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" class="form-control" id="brandimage" name="brandimage" placeholder="Enter Name">
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Logo</label>
                        <input type="file" class="form-control" id="brandlogo" name="brandlogo" placeholder="Enter Name">
                    </div>  
                    <div class="form-group iscustomlayout">
                        <input type="checkbox"  class="minimal" id="is_custom_layout" name="is_custom_layout" value="1"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Custom Layout</label>
                    </div>
                    <div class="form-group customlayout">
                        <label for="exampleInputPassword1">Please Choose a Brand Layout</label>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" value="1" name="layout" id="layout_0" /> Layout One</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img src="{{url('brand_layout/branddiagrampr.jpg')}}" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" name="layout" value="2" id="layout_1" /> Layout Two</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130"  src="{{url('brand_layout/branddiagram.jpg')}}" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" name="layout" value="3" id="layout_2" /> Layout Three</b></div>
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
                        <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group">
                        
                        <input type="checkbox"  class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
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

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Brand List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">                
                    <div id="grid"></div>

                </div>
                <!-- /.box-body -->
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
@include('extra.kendo')
<script id="edit_client" type="text/x-kendo-template">
    <a class="k-button k-button-icontext k-grid-delete" href="{{url('admin-ecom/brand')}}/#= id #"><span class="k-icon k-edit"></span>Edit</a> 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>  
    <script type="text/javascript">
    function deleteClick(id) {
    var c = confirm("Do you want to delete?");
    if (c === true) {
    $.ajax({
    type: "GET",
    dataType: "json",
    url: "brand-delete/"+id,
    success: function (result) {
    $(".k-i-refresh").click();
    }
    });
    }
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
//$("#brandimage").kendoUpload();

    


    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
    });

    $(".customlayout").fadeOut();
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

    var dataSource = new kendo.data.DataSource({
    transport: {
    read: {
    url: "brand-data",
            type: "GET",
            datatype: "JSON"

    }
    },
            autoSync: false,
            schema: {
            data: "data",
                    total: "total",
                    model: {
                    id: "id",
                            fields: {
                            id: {nullable: true},
                                    name: {type: "string"},
                                    description: {type: "string"},
                                    brandimage: {type: "string"},
                                    brandlogo: {type: "string"},
                                    isactive: {type: "string"},
                                    created_at: {type: "string"},
                                    updated_at: {type: "string"}

                            }
                    }
            },
            pageSize: 10,
            serverPaging:false,
            serverFiltering: false,
            serverSorting: false
    });
    $("#grid").kendoGrid({
    dataSource: dataSource,
            filterable: true,
            pageable: {
            refresh: true,
                    input: true,
                    numeric: false,
                    pageSizes: true,
                    pageSizes:[10, 20, 50, 100, 200, 400]
            },
            sortable: true,
            groupable: true,
            columns: [
            {field: "id", title: "BID", width: "80px"},
            {field: "name", title: "Name", width: "150px"},
            {field: "brandimage", title: "Image", width: "150px"},
            {field: "brandlogo", title: "Logo", width: "150px"},
            {field: "isactive", title: "Is Active", width: "150px"},
            {
            title: "Action", width: "290px",
                    template: kendo.template($("#edit_client").html())
            }
            ],
    });
    });

</script>

@endsection