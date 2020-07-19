@extends('layout.master')
@section('title')
Collection Only
@endsection
@section('barcum')
<h1>
    Collection Only
    <small>Enable / Disable Collection Only</small>
</h1>
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
                <h3 class="box-title"><i class="fa fa-plus"></i> Enable / Disable Collection Only</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form method="post" role="form" enctype="multipart/form-data" action="{{url('admin-ecom/enable-collection-only')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="box-body">
                    <div class="form-group">
                        
                        <input type="checkbox" 
                        @if(!empty($tab->collection_only))
                            checked="checked"  
                        @endif
                         class="minimal"  name="isactive" placeholder="Enter Name"> <label style="margin-left: 5px;" for="exampleInputPassword1"> Collection Only </label>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button> 
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

@endsection

@section('js')
<script src="{{url('plugins/iCheck/icheck.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
//$("#brandimage").kendoUpload();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
    });
    
    });

</script>
@endsection