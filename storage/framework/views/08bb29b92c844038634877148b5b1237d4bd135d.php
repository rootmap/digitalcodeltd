<?php $__env->startSection('title','Product Info'); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Product Info
    <small>Create New Product Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-tags"></i> Product Info</a></li>
    <li><a href="#" class="active">Create New Product</a></li>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Create New Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <style type="text/css">
                .single{  display: none;  }
                .multiple{  display: none;  }
                .subcid{  display: none;  }
                .modal_multiple_dropdown{  display: none;  }
                .pizza_multiple_dropdown{  display: none;  }
                .pizza_six_level_multiple_dropdown{  display: none;  }
            </style>

            <form method="post" role="form" enctype="multipart/form-data" action="<?php echo e(url('admin-ecom/product-add')); ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" class="form-control" id="proName" name="name" placeholder="Enter Name">
                    </div>

                    <div class="form-group categoryField">
                        <label for="exampleInputEmail1">Select Category </label>
                        <select class="form-control" id="cid" name="cid">
                            <option value="0">Select Category</option>
                            <?php if(!empty($cat)): ?>
                                <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($ct->id); ?>" layout="<?php echo e($ct->layout); ?>"><?php echo e($ct->name); ?></option>
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

                    <div class="form-group" style="display: none">
                        <label for="exampleInputEmail1">Product Code</label>
                        <input type="text" class="form-control" value="100" id="exampleInputEmail1" name="pcode" placeholder="Enter Code">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="summernote" name="description" placeholder="Enter Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Product Layout </label>
                        <select class="form-control" id="pri" name="input_type">
                            <option value="0">Please Select Category</option>
                            <option value="1">Main Product with no sub product</option>
                            <option value="2">Multi Sub Direct Product</option>
                            <option value="3">Multi Sub Modal Product</option>
                            <option value="4">Multi Sub Modal Multi Dropdown</option>
                            <option value="5">Pizza 3 level Modal Multi Dropdown</option>
                            <option value="6">Pizza 6 level Modal Multi Dropdown</option>
                        </select>
                    </div>
                    
                    
                    
                    <div class="form-group single">
                        <label for="exampleInputEmail1"> New Price</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="Enter New Price">
                    </div>
                    <div class="form-group single">
                        <label for="exampleInputEmail1">Old Price <code>Gives user clear understanding of price discount</code></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="old_price" placeholder="Enter Old Price">
                    </div>
                    



                    <div class="form-group multiple">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th width="50">SL</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="proArea">
                                <tr>
                                    <td>1</td>
                                    <td><input type="text" name="spname[]" class="form-control"></td>
                                    <td><input type="text" name="sdesc[]" class="form-control"></td>
                                    <td><input size="2" type="text" name="smprice[]" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger" onclick="delRow(this)">X</button></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5"><button type="button" class="btn btn-info add-row"><i class="fa fa-plus"></i></button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="form-group modal_multiple_dropdown">
                        
                        <table width="100%" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th width="50">SL</th>
                                    <th>Option Name</th>
                                    <th>Options (,) Separated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td valign="top">1</td>
                                    <td valign="top"> 
                                        <input type="text" name="dp_name[]" placeholder="Option Name" class="form-control">  
                                    </td>
                                    <td valign="top"> 
                                        <input type="text" name="dp_opt[]" placeholder="Option , comma separated" class="form-control">  
                                    </td>
                                    <td valign="top" align="center">
                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                                             
                    </div>

                    <div class="form-group pizza_multiple_dropdown">
                        <table width="100%" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Item Default Price <input type="text" name="pro_default_price" placeholder="Default Price" style="width: 150px;" class="form-control"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="pizza_modal_dropdown_name">
                                <tr class="sl_pizza_modal_dropdown_name">
                                    <td>
                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Pizza Size</th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Size</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="s_name[]" placeholder="Size Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="s_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Pizza Flabour</th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="fl_name[]" placeholder="Flabour Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="fl_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Pizza Extras</th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="e_name[]" placeholder="Flabour Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="e_desc[]" placeholder="Description" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="e_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td valign="middle" align="center">
                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><button type="button" class="btn btn-info add-pizza-dropdown-name"><i class="fa fa-plus"></i></button></td>
                                </tr>
                            </tfoot>
                        </table>
                        
                    </div>
                    <div class="form-group pizza_six_level_multiple_dropdown">
                        <table width="100%" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Item Default Price <input type="text" name="pro_default_price" placeholder="Default Price" style="width: 150px;" class="form-control"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="pizza_modal_dropdown_name">
                                <tr class="sl_pizza_modal_dropdown_name">
                                    <td>
                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Level One Name<input type="text" name="level_one_name" placeholder="Default One Name" style="width: 150px;" class="form-control"></th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="l_one_name[]" placeholder="Size Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="l_one_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Level Two Name<input type="text" name="level_two_name" placeholder="Default Two Name" style="width: 150px;" class="form-control"></th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="l_two_name[]" placeholder="Flabour Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="l_two_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Level Three Name<input type="text" name="level_three_name" placeholder="Default Three Name" style="width: 150px;" class="form-control"></th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="l_three_name[]" placeholder="Flabour Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="l_three_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Level Four Name<input type="text" name="level_four_name" placeholder="Default Four Name" style="width: 150px;" class="form-control"></th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="l_four_name[]" placeholder="Flabour Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="l_four_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Level Five Name<input type="text" name="level_five_name" placeholder="Default Five Name" style="width: 150px;" class="form-control"></th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="l_five_name[]" placeholder="Flabour Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="l_five_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <table width="100%" class="table table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Pizza Extras</th>
                                                </tr>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Price</th>
                                                    <th align="center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td valign="top">1</td>
                                                    <td valign="top">
                                                        <input type="text" name="e_name[]" placeholder="Flabour Name" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="e_desc[]" placeholder="Description" class="form-control">
                                                    </td>
                                                    <td valign="top">
                                                        <input type="text" name="e_price[]" placeholder="Price" class="form-control">
                                                    </td>
                                                    <td valign="top" align="center">
                                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                                        <button type="button" class="btn btn-info" onclick="addsubRow(this)">+</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td valign="middle" align="center">
                                        <button type="button" class="btn btn-danger" onclick="delRow(this)">X</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><button type="button" class="btn btn-info add-pizza-dropdown-name"><i class="fa fa-plus"></i></button></td>
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
<link rel="stylesheet" href="<?php echo e(url('editor/summernote-master/dist/summernote.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(url('plugins/iCheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/select2/select2.full.min.js')); ?>"></script>
<script type="text/javascript">
                        $(document).ready(function(){
                            $(".add-row").click(function(){
                                var dataClone=$("#proArea").find("tr:eq(0)").html();
                                $("#proArea").append("<tr>"+dataClone+"</tr>");
                                proArea();
                            });
                            $(".add-modal-dropdown-name").click(function(){

                                var dataClone=$(".modal_dropdown_name").find("tr:eq(0)").html();
                                $(".modal_dropdown_name").append("<tr>"+dataClone+"</tr>");
                            });

                            $(".add-row-dropdown").click(function(){
                                var dataClone=$(this).parent().parent().parent().parent().children("tbody").find("tr:eq(0)").html();
                                $(this).parent().parent().parent().parent().children("tbody").append("<tr>"+dataClone+"</tr>");
                            });

                            $(".add-pizza-dropdown-name").click(function(){
                                var dataClone=$(".pizza_modal_dropdown_name").find("tr:eq(0)").html();
                                $(".pizza_modal_dropdown_name").append("<tr>"+dataClone+"</tr>");
                            });



                        });

                        function delRow(row)
                        {
                            $(row).parent().parent().remove();
                            proArea();
                            console.log();
                        }

                        function addsubRow(row)
                        {
                            var dataRow=$(row).parent().parent().html();
                            $(row).parent().parent().parent().parent().children("tbody").append("<tr>"+dataRow+"</tr>");
                            //proArea();
                            var di=1;
                            $.each($(row).parent().parent().parent().parent().children("tbody").children("tr"),function(index,trow){
                                $(trow).find("td:eq(0)").html(di);
                                di++;
                            });
                            //console.log(dataRow);
                        }


                        function proArea()
                        {
                            var i=1;
                            $.each($("#proArea").find("tr"),function(index,row){
                                $(row).find("td:eq(0)").html(i);
                                i++;
                            });
                        }
                    </script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".subcid").fadeOut("slow");
        var layoutCheckURL="<?php echo e(url('admin-ecom/product/category/layout')); ?>";

        <?php if(!empty($scat)){
            ?>
        var totalSubCat=<?=json_encode($scat)?>;
            <?php
        }else{
            ?>
        var totalSubCat=[];
            <?php
        } ?>
        

        $("select[name=cid]").change(function(){
            var cid=$(this).val();
            var layout=$("select[name=cid]").find('option[value='+cid+']').attr("layout");
            //console.log(layout);
            if(layout==2)
            {
                
                //$(".subcid").val("");
                var rowHTML='<option value="0">Select Sub Category</option>';
                $.each(totalSubCat,function(index,row){
                    //console.log(row);
                    if(row.category_id==cid)
                    {
                        rowHTML+='<option value="'+row.id+'">'+row.name+'</option>';
                    }
                });
                console.log(rowHTML);
                $("select[name=scid]").html(rowHTML);
                $(".subcid").fadeIn("slow");
            }
            else
            {
                $(".subcid").fadeOut("fast");
            }
        });

        $("select[name=input_type]").change(function(){
            var cid=$(this).val();
            if(cid==1)
            {
                $(".single").fadeIn("slow");
                $(".multiple").fadeOut("fast");
                $(".modal_multiple_dropdown").fadeOut("fast");
            }
            else if(cid==2)
            {
                $(".single").fadeOut("fast");
                $(".multiple").fadeIn("slow");
                $(".modal_multiple_dropdown").fadeOut("fast");
            }
            else if(cid==3)
            {
                $(".single").fadeOut("fast");
                $(".multiple").fadeIn("slow");
                $(".modal_multiple_dropdown").fadeOut("fast");
            }
            else if(cid==4)
            {
                $(".single").fadeIn("slow");
                $(".multiple").fadeOut("slow");
                $(".modal_multiple_dropdown").fadeIn("slow");
            }
            else if(cid==5)
            {
                $(".single").fadeOut("fast");
                $(".multiple").fadeOut("slow");
                $(".pizza_multiple_dropdown").fadeIn("slow");
            }
            else if(cid==6)
            {
                $(".single").fadeOut("fast");
                $(".multiple").fadeOut("fast");
                $(".pizza_multiple_dropdown").fadeOut("fast");
                $(".pizza_six_level_multiple_dropdown").fadeIn("slow");
            }
            else
            {
                $(".single").fadeOut("fast");
                $(".multiple").fadeOut("fast");
                $(".modal_multiple_dropdown").fadeOut("fast");
            }
        });


        $(".select2").select2();
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