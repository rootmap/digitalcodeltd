@extends('layout.master')
@section('title')
Review Request List
@endsection
@section('barcum')
<h1>
    Review Request Info
    <small>All Review Request List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active">Review Request List</a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
<!-- Main content -->

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Review Request List</h3>
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
    {{-- <a class="k-button k-button-icontext k-grid-delete" href="{{url('admin-ecom/edit_Review_request')}}/#= id #"><span class="k-icon k-edit"></span>Edit</a> --}} 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>  
    <script type="text/javascript">
    function deleteClick(id) {
    var c = confirm("Do you want to delete?");
    if (c === true) {
    $.ajax({
    type: "GET",
    dataType: "json",
    url: "Review-Request-delete/"+id,
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
    url: "Review-Request-data",
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
                                    email: {type: "string"},
                                    subject: {type: "string"},
                                    feedback: {type: "string"},
                                    age: {type: "string"},
                                    services: {type: "string"},
                                    support: {type: "string"},
                                    team: {type: "string"},
                                    satisfaction: {type: "string"},
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
            {field: "id", title: "BID", width: "80px"},
            {field: "name", title: "Name", width: "130px"},
            {field: "email", title: "Email", width: "130px"},
            {field: "subject", title: "Subject", width: "120px"},
            {field: "feedback", title: "Feedback", width: "150px"},
            {field: "age", title: "Age", width: "80px"},
            {field: "services", title: "Our services & customer care", width: "190px"},
            {field: "support", title: "After sale's support & help Rating", width: "190px"},
            {field: "team", title: "Our team & staff valuation Rating", width: "190px"},
            {field: "satisfaction", title: "How can we improve your satisfaction"},
            {field: "created_at", title: "Created", width: "150px"},
            {
            title: "Action", width: "190px",
                    template: kendo.template($("#edit_client").html())
            }
            ],
    });
    });

</script>

@endsection