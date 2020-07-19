<?php $__env->startSection('title'); ?>
Modify Payment Method Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Edit Payment Method Info
    <small>Modify Payment Method Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(url('admin-ecom/paymentmethod')); ?>">Payment Method Info</a></li>
    <li><a href="#" class="active">Modify Payment Method</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Payment Method</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/todayoffer-update')); ?>">
                <div class="box-body">
                    
                    <input type="hidden" name="id" value="<?= $data->id; ?>" />
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Offer Title</label>
                        <input type="text" class="form-control" value="<?= $data->title; ?>" id="exampleInputEmail1" name="title" placeholder="Enter Name">
                    </div>      
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" value="<?= $data->name; ?>" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" id="editor" placeholder="Enter Description"><?= $data->description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Offer Image</label>
                        <input type="file" class="form-control" id="offerimage" name="offerimage" placeholder="Enter Name">
                    </div>
                    <?php if(!empty($data->offerimage)): ?>
                    <div class="form-group">
                        <img height="200" src="<?php echo e(url('upload/today-offer')); ?>/<?= $data->offerimage; ?>">
                    </div> 
                    <?php endif; ?>
                    <div class="form-group">

                        <input type="checkbox"
                               <?php if(!empty($data->isactive)): ?>
                               checked="checked"  
                               <?php endif; ?>
                               class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="<?php echo e(url('admin-ecom/paymentmethod')); ?>"><i class="fa fa-table"></i> Back To List</a>
                </div>
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
<script>
    $(document).ready(function () {

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        

    });
</script> 
<script>
    $(document).ready(function () {
        function onPaste(e) {
            kendoConsole.log("paste :: " + kendo.htmlEncode(e.html));
        }
        // create DateTimePicker from input HTML element
        $("#editor").kendoEditor({ resizable: {
            content: true,
            toolbar: true,
            paste: onPaste
        }});
         // $("#offerimage").kendoUpload();
    });
</script>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>