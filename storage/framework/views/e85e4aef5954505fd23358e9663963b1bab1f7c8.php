
<?php $__env->startSection('title'); ?>
Sub-Sub-Category Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Sub-Sub-Category Info
    <small>Create Sub-Sub-Category & All Sub-Sub-Category List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="#" class="active">Sub-Sub-Category Info</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Sub-Sub-Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" enctype="multipart/form-data"  role="form" action="<?php echo e(url('admin-ecom/sub-sub-category-add')); ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Category </label>
                        <select class="form-control" id="exampleInputEmail1" name="cid">
                            <option value="0">Select Category</option>
                            <?php if(!empty($cat)): ?>
                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?= $ct->id; ?>"><?= $ct->name; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Sub Category </label>
                        <select class="form-control" id="exampleInputEmail1" name="scid">
                            <option value="0">Select Category</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub-Sub-Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Enter Name">
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
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
                <h3 class="box-title"><i class="fa fa-table"></i> Sub-Sub-Category List</h3>
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
    <a class="k-button k-button-icontext k-grid-delete" href="<?php echo e(url('admin-ecom/sub-sub-category')); ?>/#= id #"><span class="k-icon k-edit"></span>Edit</a> 
    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
</script>  
<script type="text/javascript">
    function deleteClick(id) {
        var c = confirm("Do you want to delete?");
        if (c === true) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "sub-sub-category-delete/" + id,
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
                    url: "sub-sub-category-data",
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
                        cname: {type: "string"},
                        scname: {type: "string"},
                        photo: {type: "string"},
                        description: {type: "string"},
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
                {field: "cname", title: "Category"},
                {field: "scname", title: "Sub-Category "},
                {field: "name", title: "Sub-Sub-Category"},
                {field: "photo", title: "Photo"},
                {field: "created_at", title: "Created"},
                {
                    title: "Action", width: "290px",
                    template: kendo.template($("#edit_client").html())
                }
            ],
        });



        $("select[name=cid]").change(function () {
            var category_id = $(this).val();
            $.post("<?php echo e(url('admin-ecom/sub-sub-category-data/sub-category')); ?>", {'category_id': category_id,'_token':'<?=csrf_token()?>'}, function (data) {
                var htmlString = '<option value="0">Please Select</option>';
                $.each(data, function (i, item) {
                    console.log(item.name);
                    htmlString += '<option value="' + item.id + '">' + item.name + '</option>';
                });

                $("select[name=scid]").html(htmlString);

            });
        });




    });

</script>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>