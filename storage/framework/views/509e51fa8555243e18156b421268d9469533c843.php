

<?php $__env->startSection('title','Edit Inclusive Meal Info'); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Edit Inclusive Meal
    <small>Edit Inclusive Meal Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="<?php echo e(url('admin-ecom/inclusive-meal')); ?>"><i class="fa fa-tags"></i> Inclusive Meal Info</a></li>
    <li><a href="<?php echo e(url('admin-ecom/inclusive-meal/create')); ?>" class="active"> Edit  Inclusive Meal</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Edit Inclusive Meal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->



            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/inclusive-meal/update/'.$edit->id)); ?>">
                <div class="box-body">
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
		                        <label for="exampleInputEmail1">Product Name</label>
		                        <input value="<?php echo e($edit->name); ?>" type="text" class="form-control" id="proName" name="name" placeholder="Enter Name">
		                    </div>
                		</div>
                		<div class="col-md-6">
                			<div class="form-group single">
		                        <label for="exampleInputEmail1">Default New Price</label>
		                        <input value="<?php echo e($edit->price); ?>"  type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="Enter New Price">
		                    </div>
                		</div>
                	</div>
                    


                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter Description"><?php echo e($edit->description); ?></textarea>
                    </div>

                    
                    <?php
                    $optMenu=json_decode(unserialize($edit->product_json));
                    $k=1;
                    ?>
                    

                    <div class="form-group">
                        <table width="100%" class="table table-responsive">
                            <tbody class="submenu">
                                <?php if(count($optMenu)>0): ?>
                                  <?php $__currentLoopData = $optMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="subSl">
                                       <td valign="top"><?php echo e($k); ?></td>
                                       <td>
                                           <table width="100%" class="table table-bordered table-responsive">
                                               <thead>
                                                   <tr>
                                                       <th colspan="4">
                                                         <input type="text" name="pro_opt_name[]" placeholder="Require | Options | With" class="form-control" value="<?php echo e($row->pro_opt_name); ?>">
                                                         <input type="hidden" name="pro_opt_fid[]" value="<?php echo e($k); ?>">
                                                       </th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   <?php if(count($row->option_param)>0): ?>
                                                     <?php $kkk=1; ?>
                                                     <?php $__currentLoopData = $row->option_param; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <tr>
                                                           <td valign="top"><?php echo e($kkk); ?></td>
                                                           <td valign="top">
                                                               <input type="text"  name="s_name_<?php echo e($k); ?>[]" placeholder="Name" class="form-control" value="<?php echo e($rr->name); ?>">
                                                           </td>
                                                           <td valign="top">
                                                               <input type="text" name="s_price_<?php echo e($k); ?>[]" placeholder="Price" class="form-control" value="<?php echo e($rr->price); ?>">
                                                           </td>
                                                           <td valign="top" align="center">
                                                               <button type="button" class="btn btn-danger" onclick="delRowSub(this)">X</button>
                                                               <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                           </td>
                                                       </tr>
                                                       <?php $kkk++; ?>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <?php endif; ?>
                                               </tbody>
                                           </table>
                                                      
                                       </td>
                                       <td valign="middle" align="center">
                                            <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                       </td>
                                   </tr>
                                   <?php $k++; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><button type="button" class="btn btn-info add-row"><i class="fa fa-plus"></i> More Option</button></td>
                                </tr>
                            </tfoot>
                        </table>
                        
                    </div>
                    

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    
                    <div class="form-group">

                        <input type="checkbox"  class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
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
<link rel="stylesheet" href="<?php echo e(url('plugins/select2/select2.min.css')); ?>">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">

	function genRandNum()
	{
		var minNumber = 1; // le minimum
        var maxNumber = 100000000000; // le maximum
        var randomnumber = Math.floor(Math.random() * (maxNumber + 1) + minNumber);

        return randomnumber;
	}

	function subSl()
	{
		
		var k=1;
		$($('.submenu').children('tr')).each(function(r,t){
			//console.log(t.html());
			$(t).children('td:eq(0)').html(k);
			console.log();
			k++;
		});

		//refreshFieldName();
	}

	function subSlMenu(row)
	{
		//var kat=$(row).parent().parent().parent().parent().children("tbody").html();
		
		var k=1;
		$($(row).parent().parent().parent().parent().children("tbody").children('tr')).each(function(r,t){
			//console.log(t.html());
			$(t).children('td:eq(0)').html(k);
			k++;
		});
	}


	function delRow(row)
    {
        $(row).parent().parent().remove();
        //subSl();
        console.log();
    }

	function delRowSub(row)
    {
        $(row).parent().parent().remove();
    }

    function addsubRow(row)
    {
        var dataRow=$(row).parent().parent().html();
        $(row).parent().parent().parent().parent().children("tbody").append("<tr>"+dataRow+"</tr>");
        //proArea();
        subSlMenu(row);
    }

    var tt=100;
    function refreshFieldName()
    {

    	$.each($(".subSl"),function(r,t){
    		var ttt=(tt-0)+(1-0);
    		console.log(t);
    		$(t).children('td:eq(1)').children('table')
            .children('thead')
            .children('tr')
            .children('th').children('input:eq(1)')
            .val(ttt);

            $(t).children('td:eq(1)').children('table')
            .children('tbody')
            .children('tr')
            .children('td:eq(1)').children('input:eq(0)')
            .attr('name','s_name_'+ttt+'[]');

            $(t).children('td:eq(1)').children('table')
            .children('tbody')
            .children('tr')
            .children('td:eq(2)').children('input:eq(0)')
            .attr('name','s_price_'+ttt+'[]');

            /*$(t).children('td:eq(1)').children('table')
            .children('tbody')
            .children('tr')
            .children('td:eq(1)').children('input:eq(0)')
            .val(ttt);*/
            tt++;
    	});

    	
    }

    



    $(document).ready(function () {

    	

    	var kk=1100;
        $(".add-row").click(function(){


           var LineItem='<tr class="subSl">';
               LineItem+=' 	<td valign="top">1</td>';
               LineItem+='  <td>';
               LineItem+='      <table width="100%" class="table table-bordered table-responsive">';
               LineItem+='          <thead>';
               LineItem+='              <tr>';
               LineItem+='                  <th colspan="4">';
               LineItem+='                  	<input type="text" name="pro_opt_name[]" placeholder="Require | Options | With" class="form-control">';
               LineItem+='                  	<input type="hidden" name="pro_opt_fid[]" value="'+kk+'">';
               LineItem+='                  </th>';
               LineItem+='              </tr>';
               LineItem+='          </thead>';
               LineItem+='          <tbody>';
               LineItem+='              <tr>';
               LineItem+='                  <td valign="top">1</td>';
               LineItem+='                  <td valign="top">';
               LineItem+='                      <input type="text"  name="s_name_'+kk+'[]" placeholder="Name" class="form-control">';
               LineItem+='                  </td>';
               LineItem+='                  <td valign="top">';
               LineItem+='                      <input type="text" name="s_price_'+kk+'[]" placeholder="Price" class="form-control">';
               LineItem+='                  </td>';
               LineItem+='                  <td valign="top" align="center">';
               LineItem+='                      <button type="button" class="btn btn-danger" onclick="delRowSub(this)">X</button>';
               LineItem+='                      <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>';
               LineItem+='                  </td>';
               LineItem+='              </tr>';
               LineItem+='          </tbody>';
               LineItem+='      </table>';
                                
               LineItem+='  </td>';
               LineItem+='  <td valign="middle" align="center">';
               LineItem+='       <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>';
               LineItem+='  </td>';
               LineItem+='</tr>';

            kk++;
            //var dataClone=$(".submenu").find("tr:eq(0)").html();
            $(".submenu").append(LineItem);
            subSl();

            
            

           // numGenSl+=1;

            /*$(".submenu").children('tr:last').children('td:eq(1)').children('table')
            .children('thead')
            .children('tr')
            .children('th').children('input:eq(1)')
            .val(numGenSl);

            $(".submenu").children('tr:last').children('td:eq(1)').children('table')
            .children('tbody')
            .children('tr')
            .children('td:eq(1)').children('input:eq(0)')
            .attr('name','s_name_'+numGenSl+'[]');

            $(".submenu").children('tr:last').children('td:eq(1)').children('table')
            .children('tbody')
            .children('tr')
            .children('td:eq(2)').children('input:eq(0)')
            .attr('name','s_price_'+numGenSl+'[]');

            console.log(numGenSl);

            kk++;*/
        });
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>