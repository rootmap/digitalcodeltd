
<?php $__env->startSection('title'); ?>
    Admin Info List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    <i class="fa fa-tag"></i> Admin Info List
    <small>All Admin Info List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Admin Info Info</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Admin Info Setting</a></li>
    <li><a href="#" class="active">Admin Info List</a></li>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Admin Info List </h3>
                <a class="btn btn-info pull-right" href="<?php echo e(url('admin-ecom/Admin-Info-add')); ?>"><i class="fa fa-plus"></i> Create New Admin</a>
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
        <a class="k-button k-button-icontext k-grid-delete" href="<?php echo e(url('admin-ecom/Admin-Info')); ?>/#= id #"><span class="k-icon k-edit"></span>Edit</a> 
        <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script> 
    
    
    <script type="text/javascript">
    function deleteClick(id) {
    var c = confirm("Do you want to delete?");
    if (c === true) {
    $.ajax({
    type: "GET",
    dataType: "json",
    url: "Admin-Info-delete/"+id,
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
    url: "Admin-Info-Data",
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
            {field: "email", title: "Email Address"},
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