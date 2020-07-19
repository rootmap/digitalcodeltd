<?php $__env->startSection('title'); ?>
Accept Payment Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Accept Payment
    <small>Accept Payment</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active">Accept Payment Info</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Change Accept Payment</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/accept-payment-update')); ?>">
                <div class="box-body">

                    <input type="hidden" name="id" value="<?= $data->id ?>" />
                    <input type="hidden" name="exqrcode" value="<?= $data->images ?>" />
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Name">
                    </div>  
                    
                    <?php if(!empty($data->images)): ?>
                    <div class="form-group">
                        <img height="200" src="<?php echo e(url('upload/AcceptPayment')); ?>/<?= $data->images ?>">
                    </div> 
                    <?php endif; ?>
              
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button> 
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Upload New Accept Payment</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/accept-payment-add')); ?>">
                <div class="box-body">

                    
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Accept Payment Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Name">
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