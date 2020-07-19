<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo e(url('admin-ecom/dashboard')); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('admin-ecom/Admin-Info')); ?>">
                    <i class="fa fa-user"></i> <span>Admin Info</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Pages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cogs"></i> <span>Home Page</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('admin-ecom/welcome-content')); ?>"><i class="fa fa-circle-o"></i> Welcome Content</a></li>
                            
                           
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cogs"></i> <span>Review</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('admin-ecom/review-title')); ?>"><i class="fa fa-circle-o"></i> Review Title</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/Review-Request')); ?>"><i class="fa fa-circle-o"></i> Review Detail</a></li>
                           
                        </ul>
                    </li>
                    <li><a href="<?php echo e(url('admin-ecom/order-Info')); ?>"><i class="fa fa-plus"></i> Order Info</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/todayoffer')); ?>"><i class="fa fa-table"></i> Today Offer</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/table-booking')); ?>"><i class="fa fa-table"></i> Table Booking</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/gallery-photo')); ?>"><i class="fa fa-table"></i> Gallery Photo</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/new-extra-page')); ?>"><i class="fa fa-table"></i> New Page </a></li>

                </ul>
            </li>
            <li>
                <a href="<?php echo e(url('admin-ecom/seo')); ?>">
                    <i class="fa fa-tags"></i> <span>SEO Settings</span>
                </a>
            </li>
            <li>    
                <a href="<?php echo e(url('admin-ecom/Contact-Pages')); ?>">
                    <i class="fa fa-tags"></i> <span>Contact Pages Settings</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('admin-ecom/slider')); ?>">
                    <i class="fa fa-tags"></i> <span>Slider Settings</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Product Info</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cogs"></i> <span>Product Setting</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('admin-ecom/category')); ?>"><i class="fa fa-circle-o"></i> Category</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/sub-category')); ?>"><i class="fa fa-circle-o"></i> Sub-Category</a></li>
                            
                            <li><a href="<?php echo e(url('admin-ecom/tag')); ?>"><i class="fa fa-circle-o"></i> Tag</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/sub-sub-category')); ?>"><i class="fa fa-circle-o"></i> Sub-Sub-Category</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/brand')); ?>"><i class="fa fa-circle-o"></i> Brand</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/unit-type')); ?>"><i class="fa fa-circle-o"></i> Unit Type</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/color')); ?>"><i class="fa fa-circle-o"></i> Color</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/product-tag')); ?>"><i class="fa fa-circle-o"></i> Product in Tag</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo e(url('admin-ecom/new-product')); ?>"><i class="fa fa-plus"></i> New Product</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/product')); ?>"><i class="fa fa-table"></i> Product List</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Discount Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('admin-ecom/new-discount')); ?>"><i class="fa fa-plus"></i> Add New Discount</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/discount')); ?>"><i class="fa fa-table"></i> Discount List</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Delivery Cost Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('admin-ecom/new-delivery-cost')); ?>"><i class="fa fa-plus"></i> Add New Delivery Cost</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/delivery-cost')); ?>"><i class="fa fa-table"></i> Delivery Cost List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Customer Info</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cogs"></i> <span>Customer Setting</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('admin-ecom/new-customer')); ?>"><i class="fa fa-circle-o"></i> New Customer</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/customer')); ?>"><i class="fa fa-circle-o"></i> Customer List</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo e(url('admin-ecom/customer-report')); ?>"><i class="fa fa-plus"></i> Customer Report</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Order Info</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cogs"></i> <span>Manual Order</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo e(url('admin-ecom/new-orders')); ?>"><i class="fa fa-circle-o"></i> New Order</a></li>
                            <li><a href="<?php echo e(url('admin-ecom/orders')); ?>"><i class="fa fa-circle-o"></i> Order List</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo e(url('admin-ecom/orders-report')); ?>"><i class="fa fa-plus"></i> All Order Report</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/orders-report-today')); ?>"><i class="fa fa-shopping-bag"></i> Today Order Report</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/orders-paid-report')); ?>"><i class="fa fa-plus"></i> Paid Order  Report</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/orders-manual-report')); ?>"><i class="fa fa-plus"></i> Manual Order Report</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/orders-cancel-report')); ?>"><i class="fa fa-plus"></i> Cancel Order Report</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/orders-email')); ?>"><i class="fa fa-plus"></i> Order Email Settings</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Fotter Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('admin-ecom/qrcode')); ?>"><i class="fa fa-plus"></i> Site QRCode</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/social')); ?>"><i class="fa fa-plus"></i> Site Social Link</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/accept-payment')); ?>"><i class="fa fa-plus"></i> Accept Payment</a></li>
                </ul>
            </li>
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Site Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('admin-ecom/customer-support')); ?>"><i class="fa fa-plus"></i> Site Customer Support </a></li>
                    <li><a href="<?php echo e(url('admin-ecom/site/module')); ?>"><i class="fa fa-plus"></i> Site Module Settings </a></li>
                    <li><a href="<?php echo e(url('admin-ecom/contact-detail')); ?>"><i class="fa fa-plus"></i> Site Contact Detail</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/contact-request')); ?>"><i class="fa fa-plus"></i> Site Contact Request</a></li>
                    
                    <li><a href="<?php echo e(url('admin-ecom/lang')); ?>"><i class="fa fa-plus"></i> Site Language Setting</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/currency')); ?>"><i class="fa fa-plus"></i> Site Currency Setting</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/shipping')); ?>"><i class="fa fa-plus"></i> Site Shipping Setting</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/paymentmethod')); ?>"><i class="fa fa-plus"></i> Site Payment Method</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/tax')); ?>"><i class="fa fa-plus"></i> Tax Settings</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/apps-setting')); ?>"><i class="fa fa-plus"></i> Apps Setting</a></li>
                    <li><a href="<?php echo e(url('admin-ecom/paypalsetting')); ?>"><i class="fa fa-plus"></i> Paypal Setting</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

