<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $__env->yieldContent('title'); ?> | Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php if(Auth::check()): ?>
    <?php if(Auth::user()->user_type=='Customer'): ?>
      <script type="text/javascript">
          window.location = "<?php echo e(url('Home')); ?>";//here double curly bracket
      </script>
      <?php exit(); ?>
    <?php endif; ?>
  <?php endif; ?>
  
  <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/_all-skins.min.css')); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!--header place start-->

  <?php echo $__env->make('extra.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
   <?php echo $__env->make('extra.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php echo $__env->yieldContent('barcum'); ?>
    </section>
    <section class="content-header">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
  
      <?php echo $__env->yieldContent('messageinfo'); ?>
        </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">

      <?php echo $__env->yieldContent('content'); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php echo $__env->make('extra.fotter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo e(asset('plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('plugins/fastclick/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/app.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
<script>
    $(document).ready(function(){
        $('a[href="<?=$current=url()->current()?>"]').parent('li').parent('ul').parent('li').addClass('active');
        $('a[href="<?=$current=url()->current()?>"]').parent('li').addClass('active');
        
       // var dd=$('a[href="<?=$current=url()->current()?>"]').parent('li').parent('ul').parent('li').html();

    });
</script> 
<?php echo $__env->yieldContent('js'); ?>

</body>
</html>
