<?php $__env->startSection('title'); ?>
    <?php if(isset($edit)): ?>
        Edit Delivery Cost Info
    <?php else: ?>
        New Delivery Cost Info
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>

<?php if(isset($edit)): ?>
    <h1>
        Edit Delivery Cost Info
        <small>Edit Delivery Cost Info</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tags"></i> Delivery Cost Info</a></li>
        <li><a href="#"><i class="fa fa-tags"></i> Delivery Cost Setting</a></li>
        <li><a href="#" class="active">Edit Delivery Cost</a></li>
    </ol>
<?php else: ?>
    <h1>
        New Delivery Cost Info
        <small>Create New Delivery Cost Info</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tags"></i> Delivery Cost Info</a></li>
        <li><a href="#"><i class="fa fa-tags"></i> Delivery Cost Setting</a></li>
        <li><a href="#" class="active">Create New Delivery Cost</a></li>
    </ol>
<?php endif; ?>
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
                <?php if(isset($edit)): ?>
                    <h3 class="box-title"><i class="fa fa-plus"></i> Change Delivery Cost Info</h3>
                <?php else: ?>
                    <h3 class="box-title"><i class="fa fa-plus"></i> Create New Delivery Cost</h3>
                <?php endif; ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(isset($edit)): ?>
            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/delivery-cost-update/'.$edit->id)); ?>">
            <?php else: ?>
            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/delivery-cost-add')); ?>">
            <?php endif; ?>
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Zip Code </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="zip_code" 
                            <?php if(isset($edit)): ?>
                                value="<?php echo e($edit->zip_code); ?>" 
                            <?php endif; ?> 
                            placeholder="Enter Zip Code">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Delivery Cost </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="delivery_cost" 
                            <?php if(isset($edit)): ?>
                                value="<?php echo e($edit->delivery_cost); ?>" 
                            <?php endif; ?> 
                            placeholder="Enter Delivery Cost">
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="checkbox" class="minimal"  name="delivery_status" 
                            <?php if(isset($edit)): ?>
                                <?php if($edit->delivery_status=="Active"): ?>
                                    checked="checked"
                                <?php endif; ?>
                            <?php endif; ?>  
                            placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                        </div>
                    </div>
                    
                    <?php echo e(csrf_field()); ?>

                    

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <?php if(isset($edit)): ?>
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save Changes</button> 
                    <a type="reset" href="<?php echo e(url('admin-ecom/delivery-cost')); ?>" class="btn btn-danger"><i class="fa fa-times-circle"></i> Back To List</a>
                    <?php else: ?>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <?php endif; ?>
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
<script>
    $(document).ready(function () {

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        $(".number").keyup(function(){
            var val=$(this).val();
            var retData=val;
            if(parseFloat(val)<0)
            {
                retData=0;
            }

            $(this).val(retData);
        });

        $(".number").change(function(){
            var val=$(this).val();
            var retData=val;
            if(parseFloat(val)<0)
            {
                retData=0;
            }

            $(this).val(retData);
        });

    });
</script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>