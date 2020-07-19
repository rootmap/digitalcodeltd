
<?php $__env->startSection('title'); ?>
   Today Orders Report Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    <i class="fa fa-tag"></i> Today  Orders Report Info
    <small>All Today  Orders Report List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Today  Orders Report Info</a></li>
    <li><a href="#" class="active">Today  Orders Report List</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Today  Orders Report List</h3>
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
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
<?php echo $__env->make('extra.kendo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<script id="edit_client" type="text/x-kendo-template">
    <a class="k-button k-button-icontext k-grid-delete" href="<?php echo e(url('admin-ecom/orders-view')); ?>/#= id #"><span class="k-icon k-edit"></span>View Order</a> 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>  
    <script type="text/javascript">
    function deleteClick(id) {
    var c = confirm("Do you want to delete?");
    if (c === true) {
    $.ajax({
    type: "GET",
    dataType: "json",
    url: "orders-delete/"+id,
    success: function (result) {
    $(".k-i-refresh").click();
    }
    });
    }
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        


    var dataSource = new kendo.data.DataSource({
    transport: {
    read: {
    url: "orders-report-today-data",
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
                                    id: {type: "number"},
                                    name: {type: "string"},
                                    tracking: {type: "string"},
                                    invoice_date: {type: "string"},
                                    due_date: {type: "string"},
                                    order_status: {type: "string"},
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
            {field: "id", title: "OID", width: "80px"},
            {field: "tracking", title: "Track ID"},
            {field: "name", title: "Customer"},
            {field: "invoice_date", title: "Invoice Date"},
            {field: "order_status", title: "Order Status"},
            {field: "created_at", title: "Created", width: "150px"},
            {
            title: "Action", width: "270px",
                    template: kendo.template($("#edit_client").html())
            }
            ],
    });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>