@extends('layout.master')
@section('title')
Apps Setting Info
@endsection
@section('barcum')
<h1>
    Apps Setting
    <small>Apps Setting</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active">Apps Setting Info</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> New Apps Setting</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/apps-setting-add')}}">
                <div class="box-body">
                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Link</label>
                        <input type="text" class="form-control" id="image" name="link" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="" id="image" name="images" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><input type="checkbox"  class="minimal"  name="isactive" placeholder="Enter Name"> <span style="margin-left: 5px;">Is Active</span> </label>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Apps Setting List</h3>
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
    <a class="k-button k-button-icontext k-grid-delete" href="{{url('admin-ecom/apps-setting')}}/#= id #"><span class="k-icon k-edit"></span>Edit</a> 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
</script>  
<script type="text/javascript">
    function deleteClick(id) {
        var c = confirm("Do you want to delete?");
        if (c === true) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "apps-setting-delete/" + id,
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
        var dataSource = new kendo.data.DataSource({
            transport: {
                read: {
                    url: "apps-setting-data",
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
                        link: {type: "string"},
                        images: {type: "string"},
                        isactive: {type: "boolean"},
                        created_at: {type: "string"},
                        updated_at: {type: "string"}

                    }
                }
            },
            pageSize: 10,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true
        });
        $("#grid").kendoGrid({
            dataSource: dataSource,
            filterable: true,
            pageable: {
                refresh: true,
                input: true,
                numeric: false,
                pageSizes: true,
                pageSizes: [10, 20, 50, 100, 200, 400]
            },
            sortable: true,
            groupable: true,
            columns: [
                {field: "id", title: "BID", width: "80px"},
                {field: "link", title: "Link", width: "150px"},
                {title: "images", width: "150px",template: "<img src='<?=url("upload/AppsSetting")?>/#=images#' height='50' width='110'/>"},
                
                {field: "isactive", title: "Is Active", width: "150px"},
                {field: "created_at", title: "Created", width: "150px"},
                {
                    title: "Action", width: "290px",
                    template: kendo.template($("#edit_client").html())
                }
            ],
        });
    });

</script>

@endsection