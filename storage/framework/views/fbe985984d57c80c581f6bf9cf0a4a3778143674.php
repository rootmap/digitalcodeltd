
<?php $__env->startSection('title'); ?>
    Discount Report
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    <i class="fa fa-tag"></i> Discount Report
    <small>All Discount Report</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Discount Info</a></li>
    <li><a href="#" class="active">Discount Report</a></li>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Discount Report</h3>
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
    <a class="k-button k-button-edit k-grid-edit" href="<?php echo e(url('admin-ecom/discount/edit')); ?>/#=id#"><span class="k-icon k-edit"></span> Edit</a>
    </script>  

<script type="text/javascript">
    $(document).ready(function () {
        


    var dataSource = new kendo.data.DataSource({
    transport: {
        read: {
        url: "<?php echo e(url('admin-ecom/discount/json')); ?>",
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
                                minimum_amount: {type: "string"},
                                discount_option: {type: "string"},
                                discount_type: {type: "string"},
                                discount_amount: {type: "string"},
                                message: {type: "string"},
                                discount_status: {type: "string"},
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
            {field: "id", title: "ID", width: "80px"},
            {field: "minimum_amount", title: "Minimum Amount"},
            {field: "discount_option", title: "Option"},
            {field: "discount_type", title: "Type"},
            {field: "discount_amount", title: "Amount"},
            {field: "message", title: "Message"},
            {field: "discount_status", title: "Status"},
            {
            title: "Action", width: "100px",
                    template: kendo.template($("#edit_client").html())
            }
            ],
    });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>