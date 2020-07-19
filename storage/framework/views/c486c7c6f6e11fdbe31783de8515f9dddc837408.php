<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('admin-ecom/dashboard')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Admin</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin Panel</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                
                <!-- Notifications: style can be found in dropdown.less -->
                
                <!-- Tasks: style can be found in dropdown.less -->
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><i class="fa fa-user"></i> <?php echo e(Auth::user()->name); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                <i class="fa fa-user"></i> <?php echo e(Auth::user()->name); ?> - Admin
                                <small>Admin Since</small>
                                <small><?php echo e(Auth::user()->created_at); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo e(url('admin-ecom/Admin-Info/User')); ?>/<?php echo e(Auth::id()); ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form method="post" action="<?php echo e(url('logout')); ?>" >
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <button class="btn btn-default btn-flat" title="logout" rel="nofollow"><i class="icon-unlock"></i> Logout</button>
                                </form> 
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
