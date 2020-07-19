
<?php $__env->startSection('title'); ?>
    Orders Report Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    <i class="fa fa-tag"></i> Orders Report Info
    <small>All Orders Report List</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Orders Report Info</a></li>
    <li><a href="#" class="active">Orders Report List</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Orders Report List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                   
                    <table border="1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Order Status</th>
                                <th>Total Amount</th>
                                <th>Created</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($row->id); ?></td>
                                <td><?php echo e($row->cus_name); ?></td>
                                <td><?php echo e($row->order_status); ?></td>
                                <td><?php echo e($row->total); ?></td>
                                <td><?php echo e($row->created_at); ?></td>
                                <td><a href="<?php echo e(url('admin-ecom/orders-view/'.$row->id)); ?>">View Order</a></td>
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Order Status</th>
                                <th>Total Amount</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <h3>Customer Report Summery</h3>
                    <table border="" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td style="width: 500px;">Customer Name</td>
                                <td><?php echo e($row->cus_name); ?></td>
                                
                            </tr>
                            <tr>
                                
                                <td>Total Amount</td>
                                <td><?php echo e($total); ?></td>
                            </tr>
                            <tr>
                                
                                <td>Paid Oder</td>
                                <td><?php echo e($paid); ?></td>
                            </tr>
                            <tr>
                                
                                <td>Pending Order</td>
                                <td><?php echo e($pending); ?></td>
                            </tr>
                            <tr>
                                
                                <td>Cancel Order</td>
                                <td><?php echo e($cancel); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>