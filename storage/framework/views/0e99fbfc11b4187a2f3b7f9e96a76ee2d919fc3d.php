
<?php $__env->startSection('title'); ?>
    <?php if(isset($edit)): ?>
        Edit Discount Info
    <?php else: ?>
        New Discount Info
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>

<?php if(isset($edit)): ?>
    <h1>
        Edit Discount Info
        <small>Edit Discount Info</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tags"></i> Discount Info</a></li>
        <li><a href="#"><i class="fa fa-tags"></i> Discount Setting</a></li>
        <li><a href="#" class="active">Edit Discount</a></li>
    </ol>
<?php else: ?>
    <h1>
        New Discount Info
        <small>Create New Discount Info</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tags"></i> Discount Info</a></li>
        <li><a href="#"><i class="fa fa-tags"></i> Discount Setting</a></li>
        <li><a href="#" class="active">Create New Discount</a></li>
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
                    <h3 class="box-title"><i class="fa fa-plus"></i> Change Discount Info</h3>
                <?php else: ?>
                    <h3 class="box-title"><i class="fa fa-plus"></i> Create New Discount</h3>
                <?php endif; ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(isset($edit)): ?>
            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/discount-update/'.$edit->id)); ?>">
            <?php else: ?>
            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/discount-add')); ?>">
            <?php endif; ?>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Minimum Discount </label>
                            <input type="number" class="form-control number" id="exampleInputEmail1" name="minimum_amount" 
                            <?php if(isset($edit)): ?>
                                value="<?php echo e($edit->minimum_amount); ?>" 
                            <?php else: ?>
                                value="0" 
                            <?php endif; ?> 
                            placeholder="Enter Minimum Discount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Discount Category </label>
                            <select class="form-control" id="discount_option" name="discount_option">
                                <option value="">Select Category</option>
                                <option 
                                <?php if(isset($edit)): ?>
                                    <?php if($edit->discount_option=="Common"): ?>
                                        selected="selected" 
                                    <?php endif; ?> 
                                <?php endif; ?> 
                                value="Common">Common</option>
                                <option 
                                <?php if(isset($edit)): ?>
                                    <?php if($edit->discount_option=="Order Online"): ?>
                                        selected="selected" 
                                    <?php endif; ?> 
                                <?php endif; ?> 
                                value="Order Online">Order Online</option>                    
                                <option 
                                <?php if(isset($edit)): ?>
                                    <?php if($edit->discount_option=="Delivery"): ?>
                                        selected="selected" 
                                    <?php endif; ?> 
                                <?php endif; ?> 
                                value="Delivery">Delivery</option>
                                <option 
                                <?php if(isset($edit)): ?>
                                    <?php if($edit->discount_option=="Collection"): ?>
                                        selected="selected" 
                                    <?php endif; ?> 
                                <?php endif; ?> 
                                value="Collection">Collection</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Discount Amount Type </label>
                            <select class="form-control" id="discount_type" name="discount_type">
                                <option value="">Select Amount Type</option>
                                <option 
                                <?php if(isset($edit)): ?>
                                    <?php if($edit->discount_type=="Fixed"): ?>
                                        selected="selected" 
                                    <?php endif; ?> 
                                <?php endif; ?> 
                                value="Fixed">Fixed</option>
                                <option 
                                <?php if(isset($edit)): ?>
                                    <?php if($edit->discount_type=="Percentage"): ?>
                                        selected="selected" 
                                    <?php endif; ?> 
                                <?php endif; ?> 
                                value="Percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Discount Amount</label>
                            <input type="number" class="form-control number" id="exampleInputEmail1" name="discount_amount" 
                            <?php if(isset($edit)): ?>
                                value="<?php echo e($edit->discount_amount); ?>" 
                            <?php else: ?>
                                value="0" 
                            <?php endif; ?>  
                            placeholder="Enter Discount Amount">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                            <?php if(isset($edit)): ?>
                                value="<?php echo e($edit->message); ?>" 
                            <?php endif; ?>  
                             name="message" placeholder="Enter Message">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="checkbox" class="minimal"  name="discount_status" 
                            <?php if(isset($edit)): ?>
                                <?php if($edit->discount_status=="Active"): ?>
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
                    <a type="reset" href="<?php echo e(url('admin-ecom/discount')); ?>" class="btn btn-danger"><i class="fa fa-times-circle"></i> Back To List</a>
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