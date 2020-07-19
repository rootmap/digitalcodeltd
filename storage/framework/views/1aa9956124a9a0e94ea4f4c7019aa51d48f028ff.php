<?php $__env->startSection('title'); ?>
Social Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Social Info
    <small>Social</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active">Social Info</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
<?php if(isset($data)): ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Change Social</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/social-update')); ?>">
                <div class="box-body">

                    
                    <input type="hidden" name="id" value="<?= $data->id ?>" />
                    <input type="hidden" name="exsocial" value="<?= $data->social ?>" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Social Image</label>
                        <input type="file" class="form-control" id="social" name="social" placeholder="Enter Name">
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Social Link</label>
                        <input type="text" class="form-control" id="social_link" name="social_link" placeholder="Enter social link" value="<?= $data->social_link ?>">
                    </div> 
                    <?php if(!empty($data->social)): ?>
                    <div class="form-group">
                        <img height="200" src="<?php echo e(url('upload/social')); ?>/<?= $data->social ?>">
                    </div> 
                    <?php endif; ?>

                    
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
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
<?php else: ?>
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Upload New Social</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/social-add')); ?>">
                <div class="box-body">

                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Social Image</label>
                        <input type="file" class="form-control" id="social" name="social" placeholder="Enter Name">
                    </div>  

                    <div class="form-group">
                        <label for="exampleInputEmail1">Social Link</label>
                        <input type="text" class="form-control" id="social_link" name="social_link" placeholder="Enter social link">
                    </div>  
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
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
<?php endif; ?>

<!-- /.row -->
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>