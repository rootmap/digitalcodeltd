<?php $__env->startSection('title'); ?>
Modify Slider Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Edit Slider Info
    <small>Modify Slider Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(url('admin-ecom/slider')); ?>">Slider Info</a></li>
    <li><a href="#" class="active">Modify Slider</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Slider</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/slider-update')); ?>">
                <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $data->id; ?>" />
                        <input type="hidden" name="eximage" value="<?= $data->sliderimage; ?>" />
                        <label for="exampleInputEmail1">Slider Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="<?= $data->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Product </label>
                        <select class="form-control" id="exampleInputEmail1" name="product_id">
                            <option value="0">Select Product</option>
                            <?php if(!empty($product)): ?>
                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($ct->id==$data->product_id){ ?> selected="selected" <?php } ?> value="<?= $ct->id; ?>"><?= $ct->name; ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slider Image</label>
                        <input type="file" class="form-control" id="sliderimage" name="sliderimage" placeholder="Enter Name">
                    </div>
                    <?php if(!empty($data->sliderimage)): ?>
                    <div class="form-group">
                        <img height="200" src="<?php echo e(url('upload/slider')); ?>/<?= $data->sliderimage; ?>">
                    </div> 
                    <?php endif; ?>

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"><?= $data->description; ?></textarea>
                    </div>
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
                    <a class="btn btn-info pull-right" href="<?php echo e(url('admin-ecom/slider')); ?>"><i class="fa fa-table"></i> Back To List</a>
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

    });
</script>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>