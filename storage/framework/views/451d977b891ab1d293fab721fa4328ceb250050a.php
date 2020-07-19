<?php $__env->startSection('title'); ?>
Tax Info
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
                <h3 class="box-title"><i class="fa fa-plus"></i> 
                    <?php if(isset($edit)): ?>
                    Change Tax
                    <?php else: ?>
                    Create New Tax
                    <?php endif; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(isset($edit)): ?>
                <form method="post" role="form" action="<?php echo e(url('admin-ecom/Tax-update')); ?>">
            <?php else: ?>
                <form method="post" role="form" action="<?php echo e(url('admin-ecom/Tax-add')); ?>">
            <?php endif; ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tax Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" 
                        <?php if(isset($edit)): ?>
                            value="<?php echo e($edit->name); ?>" 
                        <?php endif; ?> 
                         placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tax Percent Amount</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="tax_amount" 
                        <?php if(isset($edit)): ?>
                            value="<?php echo e($edit->tax_amount); ?>" 
                        <?php endif; ?> 
                        placeholder="Enter Tax Amount (%)">
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">

                        <input type="checkbox"  class="minimal"  name="tax_status" 
                        <?php if(isset($edit)): ?>
                            <?php if($edit->tax_status=="Active"): ?>
                                checked="checked" 
                            <?php endif; ?> 
                        <?php endif; ?> 
                        placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <?php if(isset($edit)): ?>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button> 
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button> 
                    <?php endif; ?>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>
<!-- /.content -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(url('plugins/iCheck/all.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(url('plugins/iCheck/icheck.min.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>