<?php $__env->startSection('title'); ?>
Modify Category Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Edit Category Info
    <small>Modify Category Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(url('admin-ecom')); ?>"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="<?php echo e(url('admin-ecom/category')); ?>">Category Info</a></li>
    <li><a href="#" class="active">Modify Category</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form  enctype="multipart/form-data"  method="post" role="form" action="<?php echo e(url('admin-ecom/sub-category-update')); ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Category </label>
                        <select class="form-control" id="exampleInputEmail1" name="cid">
                            <option value="0">Select Category</option>
                            <?php if(!empty($cat)): ?>
                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option 
                            <?php if($ct->id==$data->category_id): ?> 
                            selected="selected" 
                            <?php endif; ?>
                             value="<?= $ct->id ?>"><?= $ct->name ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </select>
                    </div>  
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $data->id ?>" />
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Enter Name">
                    </div>
                    <input type="hidden" name="ex_photo" value="<?= $data->photo ?>">
                    <?php if(!empty($data->photo)): ?>
                        <div class="form-group">
                            <img height="200" src="<?php echo e(url('upload/category')); ?>/<?= $data->photo ?>">
                        </div> 
                    <?php endif; ?>  
                    <div class="form-group iscustomlayout">
                        <input type="checkbox" 
                        <?php if($data->is_custom_layout==1): ?>
                            checked="checked" 
                        <?php endif; ?>
                         class="minimal" id="is_custom_layout" name="is_custom_layout" value="1"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Custom Layout</label>
                    </div>
                    <div class="form-group customlayout">
                        <label for="exampleInputPassword1">Please Choose a Brand Layout</label>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input 
                                        <?php if($data->layout==1): ?>
                                            checked="checked" 
                                        <?php endif; ?> 
                                     type="radio" value="1" name="layout" id="layout_0" /> Layout One</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img src="<?php echo e(url('subcategory_layout/subl1.jpg')); ?>" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input 
                                        <?php if($data->layout==2): ?>
                                            checked="checked" 
                                        <?php endif; ?> 
                                     type="radio" name="layout" value="2" id="layout_1" /> Layout Two</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130"  src="<?php echo e(url('subcategory_layout/subl2.jpg')); ?>" />
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input 
                                        <?php if($data->layout==3): ?>
                                            checked="checked" 
                                        <?php endif; ?> 
                                     type="radio" name="layout" value="3" id="layout_2" /> Layout Three</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130" src="<?php echo e(url('subcategory_layout/subl3.jpg')); ?>" />
                                    </div>
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label class="text-center">
                                    <div class="col-md-12"><b><input 
                                       <?php if($data->layout==4): ?>
                                            checked="checked" 
                                       <?php endif; ?> 
                                     type="radio" name="layout" value="4" id="layout_3" /> Layout Four</b></div>
                                    <div class="col-md-12">
                                        <BR>
                                        <img width="130" src="<?php echo e(url('subcategory_layout/subl4.jpg')); ?>" />
                                    </div>
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"><?= $data->description ?></textarea>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="<?php echo e(url('admin-ecom/sub-category')); ?>"><i class="fa fa-table"></i> Back To List</a>
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
        <?php if($data->is_custom_layout==0): ?>
            $(".customlayout").fadeOut();
        <?php endif; ?>
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
        });

        
        $(".iscustomlayout .iCheck-helper").click(function () {
                var colorAc = $(this).parent('div').attr('aria-checked');
                //alert(colorAc);        
                if (colorAc == 'true')
                {
                    $(".customlayout").fadeIn();
                } else
                {
                    $(".customlayout").fadeOut();
                }
        });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>