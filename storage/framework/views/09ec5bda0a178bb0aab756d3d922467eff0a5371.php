<?php if(session('status')): ?>
	<style type="text/css">
		.isa_info, .isa_success, .isa_warning, .isa_error {
			margin:5px 0px;
			padding:5px;
		}
		.isa_info {
		    color: #00529B;
		    background-color: #BDE5F8;
		}
		.isa_success {
		    color: #4F8A10;
		    background-color: #DFF2BF;
		}
		.isa_warning {
		    color: #9F6000;
		    background-color: #FEEFB3;
		}
		.isa_error {
		    color: #D8000C;
		    background-color: #FFD2D2;
		}
		.isa_info i, .isa_success i, .isa_warning i, .isa_error i {
		    margin:8px 6px;
		    font-size:2em;
		    vertical-align:middle;
		}

		.isa_info .fa-times-circle, .isa_success .fa-times-circle, .isa_warning .fa-times-circle, .isa_error .fa-times-circle {
		    position: absolute;
		    right: 20px;
		}
	</style>
	<div class="container lbl-box-message-area successPlace">
	    <div class="row">
	        <div class="cell-12">
	            <div class="isa_success">
	                <i class="fa fa-check"></i>
	                	<?php echo e(session('status')); ?>

	                <i class="fa fa-times-circle close-messagelbl-area"></i>
	            </div>
	        </div>
	    </div>
	</div>
	<script type="text/javascript">
        setTimeout(function(){
            $('.successPlace').fadeOut('slow');
        }, 15000);
    </script>
<?php endif; ?>
<?php if(session('error')): ?>
	<style type="text/css">
		.isa_info, .isa_success, .isa_warning, .isa_error {
			margin:5px 0px;
			padding:5px;
		}
		.isa_info {
		    color: #00529B;
		    background-color: #BDE5F8;
		}
		.isa_success {
		    color: #4F8A10;
		    background-color: #DFF2BF;
		}
		.isa_warning {
		    color: #9F6000;
		    background-color: #FEEFB3;
		}
		.isa_error {
		    color: #D8000C;
		    background-color: #FFD2D2;
		}
		.isa_info i, .isa_success i, .isa_warning i, .isa_error i {
		    margin:8px 6px;
		    font-size:2em;
		    vertical-align:middle;
		}

		.isa_info .fa-times-circle, .isa_success .fa-times-circle, .isa_warning .fa-times-circle, .isa_error .fa-times-circle {
		    position: absolute;
		    right: 20px;
		}
	</style>
	<div class="container lbl-box-message-area allDanger">
	    <div class="row">
	        <div class="cell-12">
	            <div class="isa_error">
	                <i class="fa fa-info-circle"></i>
	                	<?php echo e(session('error')); ?>

	                <i class="fa fa-times-circle close-messagelbl-area"></i>
	            </div>
	        </div>
	    </div>
	</div>
    <script type="text/javascript">
        setTimeout(function(){
            $('.allDanger').fadeOut('slow');
        }, 15000);
    </script>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
	<style type="text/css">
		.isa_info, .isa_success, .isa_warning, .isa_error {
			margin:5px 0px;
			padding:5px;
		}
		.isa_info {
		    color: #00529B;
		    background-color: #BDE5F8;
		}
		.isa_success {
		    color: #4F8A10;
		    background-color: #DFF2BF;
		}
		.isa_warning {
		    color: #9F6000;
		    background-color: #FEEFB3;
		}
		.isa_error {
		    color: #D8000C;
		    background-color: #FFD2D2;
		}
		.isa_info i, .isa_success i, .isa_warning i, .isa_error i {
		    margin:8px 6px;
		    font-size:2em;
		    vertical-align:middle;
		}

		.isa_info .fa-times-circle, .isa_success .fa-times-circle, .isa_warning .fa-times-circle, .isa_error .fa-times-circle {
		    position: absolute;
		    right: 20px;
		}
	</style>
	<div class="container lbl-box-message-area allDanger">
	    <div class="row">
	    	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        <div class="cell-12">
		            <div class="isa_error">
		                <i class="fa fa-info-circle"></i>
		                	<?php echo e($error); ?>

		                <i class="fa fa-times-circle close-messagelbl-area"></i>
		            </div>
		        </div>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </div>
	</div>

    <script type="text/javascript">
        setTimeout(function(){
            $('.allDanger').fadeOut('slow');
        }, 15000);


    </script>
<?php endif; ?>