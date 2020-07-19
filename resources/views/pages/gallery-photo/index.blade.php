@extends('layout.master')
@section('title')
Gallery Photo Contant
@endsection
@section('barcum')
<h1>
    Gallery Photo
    <small>Create Gallery Photo List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active">Gallery Photo</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Gallery Photo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/gallery-photo-add')}}">
                <div class="box-body">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gallery Image</label>
                        <input type="file" class="form-control" id="brandimage" name="galleryphoto" placeholder="Enter Name">
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
                <h3 class="box-title"><i class="fa fa-table"></i> Gallery Photo List</h3>
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

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
@include('extra.kendo')
<script id="edit_client" type="text/x-kendo-template">
    <a class="k-button k-button-icontext k-grid-delete" href="{{url('admin-ecom/edit-gallery-photo')}}/#= id #"><span class="k-icon k-edit"></span>Edit</a> 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
</script>  
<script type="text/javascript">
    function deleteClick(id) {
        var c = confirm("Do you want to delete?");
        if (c === true) {
            $.ajax({
            type: "GET",
            dataType: "json",
            url: "gallery-photo-delete/"+id,
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
    url: "gallery-photo-data",
            type: "GET",
            datatype: "JSON"

    }
    },
            autoSync: true,
            schema: {
            data: "data",
                    total: "total",
                    model: {
                    id: "id",
                            fields: {
                                id: {nullable: true},
                                photo: {type: "string"},
                                isactive: {type: "boolean"},
                                created_at: {type: "string"},
                                updated_at: {type: "string"}
                            }
                    }
            },
            pageSize: 10,
            serverPaging:true,
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
                    pageSizes:[10, 20, 50, 100, 200, 400]
            },
            sortable: true,
            groupable: true,
            columns: [
            {field: "id", title: "ID", width: "80px"},
            // {field: "photo", title: "Gallery Photo", width: "150px"},
            { field: "photo", title: "Gallery Photo", width: "230px", template: '<img src="../upload/gallery-photo/#= photo #" width="150" height="100"/>' },
            {field: "isactive", title: "Is Active", width: "80px"},
            {field: "created_at", title: "Created", width: "150px"},
            {
            title: "Action", width: "290px",
                    template: kendo.template($("#edit_client").html())
            }
            ],
    });
    });


</script>

<script type="text/javascript" src="{{url('editor/summernote-master/dist/summernote.js')}}"></script>
{{-- <script type="text/javascript">
    $(document).ready(function () {
        $(".summernote").summernote({
            height: 200,
            tabsize: 2
        });
    });
</script> --}}
<script>
    $(document).ready(function () {
        // create DateTimePicker from input HTML element
       function onPaste(e) {
            kendoConsole.log("paste :: " + kendo.htmlEncode(e.html));
        }
        $("#editor,#editor1").kendoEditor({ resizable: {
            content: true,
            toolbar: true,
            paste: onPaste
        }});
    });
</script>  
@endsection