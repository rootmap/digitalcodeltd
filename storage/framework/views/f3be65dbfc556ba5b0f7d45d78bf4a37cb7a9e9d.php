
<?php $__env->startSection('title'); ?>
View Order Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    View Order Info
    <small>View Order Detail</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Order Info</a></li>
    <li><a href="#"><i class="fa fa-tags"></i> Manual Order Info</a></li>
    <li><a href="#" class="active">Create New Manual Order</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
<!-- Main content -->
<div class="row" id="printsss">
    <?php //print_r($order); ?>
    <div class="col-md-12">
        <div class="panel panel-invoice rounded">
            <div class="panel-heading">
                <div class="pull-left">
                    <h3 class="no-margin"> <code>Tracking No.#<?= $order[0]->tracking?></code></h3>
                </div>
                <div class="pull-right">
                    <div class="logo-block"><img data-no-retina src="<?php echo e(url('plugins/def.jpg')); ?>" alt="Logo"></div>
                </div>
                <div class="clearfix"></div>
            </div><!-- /.panel-heading -->
            <div class="panel-sub-heading">
                <div class="row inner-all">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="text-left mb-10">
                            <h3 class="mt-0">Company information</h3>
                            <strong>FROM</strong>
                            <address>
                                <strong>Djava UI, Inc.</strong><br>
                                Tambak bayan no.13, Babarsari, Sleman<br>
                                Yogyakarta, DIY 94107<br>
                                <abbr title="Phone">P:</abbr> (777) 777-66666
                            </address>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="text-right">
                            <h3 class="mt-0">Client information</h3>
                            <strong>TO</strong>
                            <address>
                                <strong><?= $order[0]->name?></strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                            <br/>
                            <p class="text-right"><strong>Invoice Date:</strong> <?= $order[0]->invoice_date?></p>
                            <p class="text-right"><strong>Due Date:</strong> <?= $order[0]->due_date?></p>
                        </div>
                    </div>
                </div>
            </div><!-- /.panel-sub-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                     
                    <table class="table table-striped table-theme">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th style="width: 100px !important;">Qty</th>
                                <th>Unit Price $</th>
                                <th>Tax Rate %</th>
                                <th>Tax</th>
                                <th style="width: 50px !important;">Total Price $</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $rowtotal=0;
                            $quantity=0;
                            $vatamount=0;
                            
                            ?>
                            <?php if(isset($order_item)): ?>
                            <?php $__currentLoopData = $order_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?=$item->name?></td>
                                <td><?=$item->quantity?>
                                   <?php if(!empty($item->unit)): ?>
                                   <br>
                                    [<b>Unit : </b> <?php echo e($item->unit); ?> ]
                                   <?php endif; ?> 
                                   <?php if(!empty($item->color)): ?>
                                    <br>
                                    [<b>Color : </b> <?php echo e($item->color); ?> ]
                                   <?php endif; ?>
                                
                                </td>
                                <td><?=$item->unit_price?></td>
                                <td><?=$item->tax_rate?></td>
                                <td><?=$item->tax_amount?></td>
                                <td><?=$item->row_total?></td>
                            </tr>
                            <?php 
                            $rowtotal+=$item->row_total;
                            $quantity+=$item->quantity;
                            $vatamount+=$item->tax_amount;
                            ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" rowspan="5" style="margin-top:0px;">

                                    <table style="width: 50%; margin-bottom: 20px;" class="table table-striped">
                                       <tbody>
                                            <tr>
                                                <td colspan="4" align="center"><b>Delivery Details</b></td>
                                            </tr>                                            
                                            <tr>
                                                <td>Order Type</td>
                                                <td><?php echo e($order[0]->order_type); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Date &amp; Time</td>
                                                <td>
                                                    <?php if($order[0]->delivery_asap==1): ?>
                                                        ASAP
                                                    <?php else: ?>
                                                        <?php echo e($order[0]->delivery_date); ?> - <?php echo e($order[0]->delivery_time); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php if($order[0]->order_online==1): ?>
                                            <tr>
                                                <td>Order Online</td>
                                                <td>
                                                    Yes
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php if($order[0]->order_online==1): ?>
                                            <tr>
                                                <td>Payment Type</td>
                                                <td>
                                                    Cash
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php if(!empty($order[0]->delivery_note)): ?>
                                            <tr>
                                                <td>Note </td>
                                                <td>
                                                    <?php echo e($order[0]->delivery_note); ?>

                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>


                                    <?php
                                            $paid=0;
                                            $mp=false;
                                            ?>
                                            <?php if(isset($ot)): ?>
                                            <?php if(count($ot)>0): ?>
                                    <table style="width: 70%;" class="table table-striped">
                                       <tbody>
                                            <tr>
                                                <td>Transaction</td>
                                                <td>Payment Method</td>
                                                <td>Order Amount</td>
                                                <td>Payment Status</td>
                                            </tr>
                                            
                                            <?php $__currentLoopData = $ot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>TR100<?=$tt->id?></td>
                                                <td><?=$tt->name?></td>
                                                <td><?=$tt->amount?></td>
                                                <td><?=$tt->status?></td>
                                            </tr>
                                            <?php
                                            $paid+=$tt->amount;
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </tbody>
                                    </table>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                </td>
                                <td colspan="2">Total (Net)</td>
                                <td colspan="2"><?=$rowtotal?></td>
                            </tr>
                            <tr>
                                <td colspan="2">VAT</td>
                                <td colspan="2"><?=$vatamount?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Total</b></td>
                                <td colspan="2"><b><?php 
                                $total=$rowtotal+$vatamount;
                                echo $total;
                                ?></b></td>
                            </tr>
                            <?php if($order[0]->order_online==1): ?>
                                <tr>
                                    <td colspan="2"><b>Paid</b></td>
                                    <td colspan="2"><b><?=$total?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Due</b></td>
                                    <td colspan="2"><b>0.00</b></td>
                                </tr>
                            <?php else: ?>
                                <?php if(isset($ot)): ?>
                                <tr>
                                    <td colspan="2"><b>Paid</b></td>
                                    <td colspan="2"><b><?=$paid?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Due</b></td>
                                    <td colspan="2"><b>
                                        
                                            <?php 
                                    $due=$total-$paid;
                                    if($due>0)
                                    {
                                        echo $due;
                                    }
                                    else
                                    {  
                                        $mp=TRUE;
                                        echo 0;
                                    }
                                    ?>
                                        </b></td>
                                </tr>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tfoot>

                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.panel-body -->
            <div class="panel-footer">
                <div class="pull-left hidden-sm hidden-xs">
                    <button style="margin-right: 20px;" onclick="window.print();" class="btn btn-default pull-right mr-5 rounded"><i class="fa fa-print"></i> Print</button>
                </div>
                <?php if($mp==FALSE && $order[0]->order_online==0){ ?>  
                <div class="pull-right">
                    <a href="<?php echo e(url('admin-ecom/payment')); ?>/<?php echo $total; ?>/<?= $order[0]->id?>" class="btn btn-success pull-right rounded"><i class="fa fa-fw fa-arrow-right"></i> Proceed to Payment</a>
                    
                </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div><!-- /.panel-footer -->
        </div><!-- /.panel-invoice -->
    </div>
</div><!-- /.row -->
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(url('plugins/iCheck/all.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('plugins/select2/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('plugins/invoice.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('plugins/default.theme.css')); ?>">
<style type="text/css">
@media  print
{
body * { visibility: hidden; }
#printsss * { visibility: visible; }
#printsss { position: absolute; top: 40px; left: 30px; }

}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(url('plugins/iCheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>