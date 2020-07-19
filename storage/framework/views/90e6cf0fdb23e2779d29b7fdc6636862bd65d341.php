
<?php $__env->startSection('title'); ?>
Modify Product Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Edit Product Info
    <small>Modify Product Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(url('admin-ecom')); ?>"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="<?php echo e(url('admin-ecom/product')); ?>">Product Info</a></li>
    <li><a href="#" class="active">Modify Product</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/product-update')); ?>">
                <div class="box-body">
                    <input type="hidden" name="id" value="<?= $data->id ?>" />

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" value="<?= $data->name ?>" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Code</label>
                        <input type="text" value="<?= $data->pcode ?>" class="form-control" id="exampleInputEmail1" name="pcode" placeholder="Enter Code">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1"> New Price</label>
                        <input type="text" class="form-control" value="<?= $data->price ?>" id="exampleInputEmail1" name="price" placeholder="Enter New Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Price <code>Used to give discount</code></label>
                        <input type="text" value="<?= $data->old_price ?>" class="form-control" id="exampleInputEmail1" name="old_price" placeholder="Enter Old Price">
                    </div>
                    <div class="form-group categoryField">
                        <label for="exampleInputEmail1">Select Category </label>
                        <select class="form-control" id="cid" name="cid">
                            <option value="0">Select Category</option>
                            <?php if(!empty($cat)): ?>
                                <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option 
                                        <?php if($ct->id==$data->cid): ?>
                                            selected="selected" 
                                        <?php endif; ?>
                                        value="<?= $ct->id ?>" layout="<?php echo e($ct->layout); ?>"><?= $ct->name ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </select>
                    </div>

                    <div class="form-group subcid">
                        <label for="exampleInputEmail1">Select Sub-Category </label>
                        <select class="form-control" id="subcid" name="scid">
                            <option value="0">Please Select Category</option>
                        </select>
                    </div>
                    
                    

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="summernote" name="description" placeholder="Enter Description"><?=$data->description ?></textarea>
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
                    <a class="btn btn-info pull-right" href="<?php echo e(url('admin-ecom/product')); ?>"><i class="fa fa-table"></i> Back To List</a>
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
<link rel="stylesheet" href="<?php echo e(url('plugins/select2/select2.min.css')); ?>">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<link rel="stylesheet" href="<?php echo e(url('editor/summernote-master/dist/summernote.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(url('plugins/iCheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/select2/select2.full.min.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $(".select2").select2();
        
        $(".subcid").fadeOut("slow");
        var layoutCheckURL="<?php echo e(url('admin-ecom/product/category/layout')); ?>";
        $("select[name=cid]").change(function(){
            var cid=$(this).val();
            var layout=$("select[name=cid]").find('option[value='+cid+']').attr("layout");
            console.log(layout);
            if(layout==4)
            {
                $(".subcid").fadeIn("slow");
            }
            else
            {
                $(".subcid").fadeOut("fast");
            }
        });

    });
</script>  


<script type="text/javascript" src="<?php echo e(url('editor/summernote-master/dist/summernote.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".summernote").summernote({
            height: 300,
            tabsize: 2
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>