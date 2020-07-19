<?php $__env->startSection('title'); ?>
Modify Gallery Photo
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Edit Gallery Photo
    <small>Modify Gallery Photo</small>
</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(url('admin-ecom/orderInfo')); ?>">Payment Gallery Photo</a></li>
    <li><a href="#" class="active">Modify Gallery Photo</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Gallery Photo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/gallery-photo-update/'.$data->id)); ?>">
                <div class="box-body">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="eximage" value="<?php echo e($data->photo); ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gallery Image</label>
                        <br>
                        <?php if(isset($data)): ?><img width="30%" src="<?php echo e(URL::asset('upload/gallery-photo/'.$data->photo)); ?>"><?php endif; ?>
                        <input type="file" class="form-control" id="brandimage" name="galleryphoto" placeholder="Enter Name">
                    </div> 
                    <div class="form-group">
                        
                        <input type="checkbox"  class="minimal"
                         <?php if(isset($data)): ?>
                            <?php if($data->isactive=='1'): ?>
                                checked="checked" 
                            <?php endif; ?>
                         <?php endif; ?>
                          name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
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
        $("#datepicker").kendoDatePicker({
            value: new Date(),
            dateInput: true
        });
        $("#timepicker").kendoTimePicker({
            value: new Date(),
            dateInput: true
        });
        $("#editor").kendoEditor({ resizable: {
            content: true,
            toolbar: true,
            paste: onPaste
        }});
    });
</script>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>