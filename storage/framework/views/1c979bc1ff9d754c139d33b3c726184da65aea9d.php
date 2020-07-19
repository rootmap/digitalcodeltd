
<?php $__env->startSection('title'); ?>
    Customer Report
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    <i class="fa fa-tag"></i> Customer Report
    <small>All Customer Report</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Customer Info</a></li>
    <li><a href="#" class="active">Customer Report</a></li>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Customer Report</h3>
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
    <a class="k-button k-button-icontext k-grid-delete" href="<?php echo e(url('admin-ecom/customer-orders-report')); ?>/#=id#"><span class="k-icon k-plus"></span>View All Invoice</a>
    </script>  
    <script type="text/javascript">
    function deleteClick(id) {
    var c = confirm("Do you want to delete?");
    if (c === true) {
    $.ajax({
    type: "GET",
    dataType: "json",
    url: "customer-delete/"+id,
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
    url: "customer-data-report",
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
                                    sex: {type: "string"},
                                    phone: {type: "string"},
                                    email: {type: "string"},
                                    total: {type: "string"},
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
            {field: "id", title: "CID", width: "80px"},
            {field: "name", title: "Name"},
            {field: "total", title: "Total Order Amount"},
            {field: "created_at", title: "Created", width: "150px"},
            {
            title: "Action", width: "170px",
                    template: kendo.template($("#edit_client").html())
            }
            ],
    });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>