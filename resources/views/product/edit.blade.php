@extends('layout.master')
@section('title')
Modify Product Info
@endsection
@section('barcum')
<h1>
    Edit Product Info
    <small>Modify Product Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom')}}"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="{{url('admin-ecom/product')}}">Product Info</a></li>
    <li><a href="#" class="active">Modify Product</a></li>
</ol>
@endsection

@include('extra.msg')

@section('content')
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

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/product-update')}}">
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
                            @if(!empty($cat))
                                @foreach($cat as $ct)
                                    <option 
                                        @if($ct->id==$data->cid)
                                            selected="selected" 
                                        @endif
                                        value="<?= $ct->id ?>" layout="{{$ct->layout}}"><?= $ct->name ?></option>
                                @endforeach
                            @endif

                        </select>
                    </div>

                    <div class="form-group subcid">
                        <label for="exampleInputEmail1">Select Sub-Category </label>
                        <select class="form-control" id="subcid" name="scid">
                            <option value="0">Please Select Category</option>
                        </select>
                    </div>
                    @if($productOneSubLevel_count>0)
                    <input type="hidden" name="productOneSubLevel_count" value="1">
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

                                @foreach($productOneSubLevel as $index=>$row)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td><input type="text" name="spname[]" class="form-control" value="{{$row->name}}"></td>
                                    <td><input type="text" name="sdesc[]" class="form-control" value="{{$row->description}}"></td>
                                    <td><input size="2" type="text" name="smprice[]"  value="{{$row->price}}" class="form-control"></td>
                                    <td><button type="button" class="btn btn-danger" onclick="delRow(this)">X</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5"><button type="button" class="btn btn-info add-row"><i class="fa fa-plus"></i></button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @endif
                    

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea class="summernote" name="description" placeholder="Enter Description"><?=trim(strip_tags(html_entity_decode($data->description)))?></textarea>
                    </div>


                    <div class="form-group">

                        <input type="checkbox"
                               @if(!empty($data->isactive))
                                checked="checked"  
                               @endif
                               class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Is Active</label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square"></i> Modify</button> 
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times-circle"></i> Reset</button>
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/product')}}"><i class="fa fa-table"></i> Back To List</a>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>


<!-- /.row -->
<!-- /.content -->
@endsection

@section('css')
<link rel="stylesheet" href="{{url('plugins/iCheck/all.css')}}">
<link rel="stylesheet" href="{{url('plugins/select2/select2.min.css')}}">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<link rel="stylesheet" href="{{url('editor/summernote-master/dist/summernote.css')}}" />
@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{url('plugins/select2/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".select2").select2();
        
        $(".subcid").fadeOut("slow");
        var layoutCheckURL="{{url('admin-ecom/product/category/layout')}}";
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


<script type="text/javascript" src="{{url('editor/summernote-master/dist/summernote.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
       /* $(".summernote").summernote({
            height: 300,
            tabsize: 2
        });*/

        $(".summernote").css("display","block");
        $(".summernote").css("width","100%");
        $(".summernote").css("min-height","100px");
    });
</script>
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
                            var di_text='';
                            di_text+='<option value="No Parent">No Parent</option>';
                            var di_len=$(row).parent().parent().parent().parent().children("tbody").children("tr");
                            var lendi=di_len.length;
                            $.each(di_len,function(index,trow){
                                    $(trow).find("td:eq(0)").html(di);
                                    var dt=$(trow).find("td:eq(1)").children(".dp_name").val();
                                    var dtn=$(trow).find("td:eq(1)").children(".hidno").val();
                                    if(dt.length>0)
                                    {
                                        console.log(lendi,di);
                                        if((lendi-1)==di)
                                        {
                                            dtn=Math.random();
                                            $(trow).find("td:eq(1)").children(".hidno").val(dtn);

                                        }
                                        di_text+='<option value="'+dtn+'">'+dt+'</option>';
                                        //console.log(di,dt);
                                    }

                                    if(lendi==di)
                                    {
                                        $(trow).find("td:eq(3)").children("select").html(di_text);
                                    }
                                    
                                    
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
        var layoutCheckURL="{{url('admin-ecom/product/category/layout')}}";

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

<script type="text/javascript" src="{{url('editor/summernote-master/dist/summernote.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        /*$(".summernote").summernote({
            height: 300,
            tabsize: 2
        });*/
        $(".summernote").css("display","block");
        $(".summernote").css("width","100%");
        $(".summernote").css("min-height","100px");
    });
</script>
@endsection
