
<?php $__env->startSection('title'); ?>
Contact Request Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Contact Request Info
    <small>Create Contact Request Info & All Contact List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active">Contact Request Info</a></li>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Contact Request List</h3>
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

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(url('plugins/iCheck/all.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(url('plugins/iCheck/icheck.min.js')); ?>"></script>
<?php echo $__env->make('extra.kendo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script id="edit_client" type="text/x-kendo-template">
    <a class="k-button k-button-icontext k-grid-delete" href="<?php echo e(url('admin-ecom/edit_contact_request')); ?>/#= id #"><span class="k-icon k-edit"></span>Detail</a> 
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
    url: "Contact-Request-data",
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
                                    phone: {type: "string"},
                                    message: {type: "string"},
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
            {field: "name", title: "Name", width: "150px"},
            {field: "email", title: "Email", width: "150px"},
            {field: "phone", title: "Phone", width: "150px"},
            {field: "message", title: "Message", width: "150px"},
            {field: "created_at", title: "Created", width: "150px"},
            {
            title: "Action", width: "90px",
                    template: kendo.template($("#edit_client").html())
            }
            ],
    });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>