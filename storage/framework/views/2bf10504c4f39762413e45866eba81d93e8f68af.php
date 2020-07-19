<?php $__env->startSection('title'); ?>
Category Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Category Info
    <small>Create Category & All Category List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="#" class="active">Category Info</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form  enctype="multipart/form-data"  method="post" role="form" action="<?php echo e(url('admin-ecom/category-add')); ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Please Choose a Category Layout</label>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" value="1" name="layout" id="layout_0" /> Layout One</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img src="<?php echo e(url('ecom_layout/c1.png')); ?>" />
                                    </div>
                                </label>
                            </div>
                            
                            <div class="col-md-2">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input type="radio" name="layout" value="2" id="layout_2" /> Layout Four</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img src="<?php echo e(url('ecom_layout/c4.png')); ?>" />
                                    </div>
                                </label>
                            </div>
                           
                        </div>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Category List</h3>
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
    <a class="k-button k-button-icontext k-grid-delete" href="<?php echo e(url('admin-ecom/category')); ?>/#= id #"><span class="k-icon k-edit"></span>Edit</a> 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
</script>  
<script type="text/javascript">
    function deleteClick(id) {
        var c = confirm("Do you want to delete?");
        if (c === true) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "category-delete/" + id,
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
                    url: "category-data",
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
                        layout: {type: "number"},
                        created_at: {type: "string"},
                        updated_at: {type: "string"}

                    }
                }
            },
            pageSize: 10,
            serverPaging: false,
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
                pageSizes: [10, 20, 50, 100, 200, 400]
            },
            sortable: true,
            groupable: true,
            columns: [
                {field: "id", title: "CID", width: "80px"},
                {field: "name", title: "Name", width: "150px"},
                {field: "layout", title: "Layout", width: "150px"}, 
                {field: "created_at", title: "Created", width: "150px"},
                {
                    title: "Action", width: "290px",
                    template: kendo.template($("#edit_client").html())
                }
            ],
        });




    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>