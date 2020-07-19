@extends('layout.master')
@section('title')
Modify Sub-SubCategory Info
@endsection
@section('barcum')
<h1>
    Edit Sub-SubCategory Info
    <small>Modify Sub-SubCategory Info</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('admin-ecom')}}"><i class="fa fa-cogs"></i> Product Setting</a></li>
    <li><a href="{{url('admin-ecom/category')}}">Category Info</a></li>
    <li><a href="#" class="active">Modify Sub-Sub-Category</a></li>
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
                <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit Sub-Sub-Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form  enctype="multipart/form-data"  method="post" role="form" action="{{url('admin-ecom/sub-sub-category-update')}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Category </label>
                        <select class="form-control" id="exampleInputEmail1" name="cid">
                            <option value="0">Select Category</option>
                            @if(!empty($cat))
                                @foreach($cat as $ct)
                                <option 
                                @if($ct->id==$data->category_id) 
                                selected="selected" 
                                @endif
                                 value="<?= $ct->id ?>"><?= $ct->name ?></option>
                                @endforeach
                            @endif

                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Sub Category </label>
                        <select class="form-control" id="exampleInputEmail1" name="scid">
                            <option value="0">Select Category</option>
                            @if(!empty($scat))
                                @foreach($scat as $ct)
                                <option 
                                @if($ct->id==$data->sub_category_id) 
                                selected="selected" 
                                @endif
                                 value="<?= $ct->id ?>"><?= $ct->name ?></option>
                                @endforeach
                            @endif

                        </select>
                    </div>  
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $data->id ?>" />
                        <label for="exampleInputEmail1">Sub-Sub-Category Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="<?= $data->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Change Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Enter Name">
                    </div>
                    <input type="hidden" name="ex_photo" value="<?= $data->photo ?>">
                    @if(!empty($data->photo))
                        <div class="form-group">
                            <img height="200" src="{{url('upload/subcategory')}}/<?= $data->photo ?>">
                        </div> 
                    @endif  
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
                    <a class="btn btn-info pull-right" href="{{url('admin-ecom/sub-sub-category')}}"><i class="fa fa-table"></i> Back To List</a>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>

<script>
    $(document).ready(function(){
        $("select[name=cid]").change(function () {
            var category_id = $(this).val();
            $.post("{{url('admin-ecom/sub-sub-category-data/sub-category')}}", {'category_id': category_id,'_token':'<?=csrf_token()?>'}, function (data) {
                var htmlString = '<option value="0">Please Select</option>';
                $.each(data, function (i, item) {
                    console.log(item.name);
                    htmlString += '<option value="' + item.id + '">' + item.name + '</option>';
                });

                $("select[name=scid]").html(htmlString);

            });
        });
    });
</script>    
<!-- /.row -->
<!-- /.content -->
@endsection




























