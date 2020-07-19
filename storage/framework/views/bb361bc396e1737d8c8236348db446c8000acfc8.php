<?php $__env->startSection('title'); ?>
Dashboard 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('barcum'); ?>
<h1>
    Dashboard
</h1>
<ol class="breadcrumb">
    <li><a href="#" class="active">Dashboard</a></li>
</ol>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e(count($today_order)); ?></h3>

                <p>Today All Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo e(url('admin-ecom/orders-report-today')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo e(count($order_paid)); ?></h3>

                <p>All Paid Order</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo e(url('admin-ecom/orders-paid-report')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo e(count($all_user)); ?></h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo e(url('admin-ecom/customer-report')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo e(count($all_order)); ?></h3>

                <p>Site All Order</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo e(url('admin-ecom/orders-report')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>









    <!-- ./col -->
    
    <!-- ./col -->
</div>

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-table"></i> Today All Order List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">                
                    <div id="grid"></div>

                </div>
                <!-- /.box-body -->
            </form>
        </div>
        <!-- /.box -->

    </div>
    <!--/.col (left) -->
</div>
<!-- /.row -->
<!-- Main row -->

<!-- /.row (main row) -->


<!-- /.content-wrapper -->

<!-- Control Sidebar -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(url('plugins/iCheck/all.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('plugins/select2/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('extra.kendo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script id="edit_client" type="text/x-kendo-template">
        <a class="k-button k-button-icontext k-grid-delete" href="<?php echo e(url('admin-ecom/orders-view')); ?>/#= id #"><span class="k-icon k-edit"></span>View Order</a> 
        <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
    </script>  
    <script type="text/javascript">
        function deleteClick(id) {
            var c = confirm("Do you want to delete?");
            if (c === true) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "orders-delete/" + id,
                    success: function (result) {
                        $(".k-i-refresh").click();
                    }
                });
            }
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var dataSource = new kendo.data.DataSource({
                transport: {
                    read: {
                        url: "orders-report-today-data",
                        type: "GET",
                        datatype: "JSON"
                    }
                },
                autoSync: false,
                schema: {
                    data: "data",
                    total: "total",
                    model: {
                        id: "id",
                        fields: {
                            id: {nullable: true},
                            name: {type: "string"},
                            tracking: {type: "string"},
                            invoice_date: {type: "string"},
                            due_date: {type: "string"},
                            order_status: {type: "string"},
                            created_at: {type: "string"},
                            updated_at: {type: "string"}

                        }
                    }
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true
            });
            $("#grid").kendoGrid({
                dataBound:gridDataBound,
                dataSource: dataSource,
                filterable: true,
                pageable: {
                    refresh: true,
                    input: true,
                    numeric: false,
                    pageSizes: true,
                    pageSizes: [10, 20, 50, 100, 200, 400]
                },
                sortable: true,
                groupable: true,
                columns: [
                    {field: "id", title: "OID", width: "80px"},
                    {field: "tracking", title: "Track ID"},
                    {field: "name", title: "Customer"},
                    {field: "invoice_date", title: "Invoice Date"},
                    {field: "order_status", title: "Order Status"},
                    {field: "created_at", title: "Created", width: "150px"},
                    {
                        title: "Action", width: "270px",
                        template: kendo.template($("#edit_client").html())
                    }
                ],
            });
        });

    </script>
<script src="<?php echo e(url('plugins/iCheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/select2/select2.full.min.js')); ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
//$("#brandimage").kendoUpload();
        $(".select2").select2();
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        $("#cid").change(function () {
            var cid = $(this).val();
            if (cid == null || cid == 0)
            {
                var loadingscid = '<option value="0">Please Select Category</option>';
                $("#subcid").html(loadingscid);
            } else
            {
                var loadingscid = '<option value="0">Loading Please Wait...</option>';
                $("#subcid").html(loadingscid);

                $.post("./product-filter-subcat-data", {'cid': cid, '_token': '<?php echo csrf_token(); ?>'}, function (cdata) {
                    //console.log(cdata);
                    var loadingscid = '<option value="0">Please Select Sub Category</option>';

                    $.each(cdata, function (index, val) {
                        //console.log(val);
                        loadingscid += '<option value="' + val.id + '">' + val.name + '</option>';
                    });

                    var getlength = cdata.length;
                    //console.log(getlength);
                    if (getlength == 0)
                    {
                        var loadingscid = '<option value="0">Please Select Another Category</option>';
                        $("#subcid").html(loadingscid);
                    } else
                    {
                        $("#subcid").html(loadingscid);
                    }
//                    if(cdata==null)
//                    {
//                        var loadingscid = '<option value="0">Please Select Category</option>';
//                        $("#subcid").html(loadingscid);
//                    }
//                    else
//                    {
//                        $("#subcid").html(cdata);
//                    }
                });
            }
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>