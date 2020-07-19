<style type="text/css">
	.category_fix_menu {
	    position: fixed;
	    z-index: 1;
	    top: 120px;
	}
	.category_fix_menu div ul li {
		width: 241px !important;
	}

	.category_fix_menu_all {
	    position: fixed;
	    z-index: 1;
	    top: 158px;
	}
	.category_fix_menu_all div ul li {
		width: 241px !important;
	}

	.mini_fix_shopping_cart {
	    position: fixed;
	    z-index: 1;
	    top: 120px;
	    width: 260px !important;
	}

	.mini_fix_shopping_cart .mini-cart {
		
	}

	.blog-cat-w > div > ul > li:hover:after{
		content: ".";
		color: red;
		background: #f00;
		position: absolute;
		right: 0px;
		padding: 10px 0px;
		margin-top: -10px !important;
	}

	.blog-cat-w > div > ul > li.active:after{
		content: ".";
		color: red;
		background: #f00;
		position: absolute;
		right: 0px;
		padding: 10px 0px;
		margin-top: -10px !important;
	}

	/* width */
    .mini-category-list::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    .mini-category-list::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
     
    /* Handle */
    .mini-category-list::-webkit-scrollbar-thumb {
        background: #888; 
    }

    /* Handle on hover */
    .mini-category-list::-webkit-scrollbar-thumb:hover {
        background: #e7512f; 
    }
</style>
<div style=" padding-bottom:0px !important;" class="widget blog-cat-w fx mini-category-list" id="menu_page_category" data-animate="fadeInLeft">
	<h3 class="widget-head">categories</h3>
</div>
<div class="widget blog-cat-w fx mini-category-list" id="menu_page_category_full" data-animate="fadeInLeft" style="max-height: 420px !important; overflow-y: scroll !important; border-top: 1px #ccc solid; border-bottom: 1px #ccc solid; padding-bottom:0px !important;">
	<div class="widget-content" style="padding: 0px 10px !important;">
		<ul class="list list-ok alt">
			<li><a class="menu_page_category"  href="#pro_inclusive_meal">ALL INCLUSIVE MEAL</a></li>
			<?php if(count($category)>0): ?>
				<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a class="menu_page_category"  href="#pro<?php echo e($cat['id']); ?>"><?php echo e($cat['name']); ?></a><span>[<?php echo e($cat['product']); ?>]</span></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

		</ul>
	</div>
</div>

<!-- <div class="bottomMenu"></div> -->
<!-- <div class="widget r-posts-w sale-widget fx" data-animate="fadeInLeft">
	<h3 class="widget-head">Top Sale</h3>
	<div class="widget-content">
		<ul>
			<li>
				<div class="post-img">
					<img src="images/shop/pro-1.jpg" alt="">
				</div>
				<div class="widget-post-info">
					<h4>
						<a href="blog-single.html">Phasellus blandit elementum</a>
					</h4>
					<div class="meta">
						<div class="item-rating">
							<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="post-img">
					<img src="images/shop/pro-2.jpg" alt="">
				</div>
				<div class="widget-post-info">
					<h4>
						<a href="blog-single.html">SAMSUNG GALAXY MOBILE</a>
					</h4>
					<div class="meta">
						<div class="item-rating">
							<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="post-img">
					<img src="images/shop/pro-3.jpg" alt="">
				</div>
				<div class="widget-post-info">
					<h4>
						<a href="blog-single.html">MEDIA TECH</a>
					</h4>
					<div class="meta">
						<div class="item-rating">
							<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="widget fx" data-animate="fadeInLeft">
	<h3 class="widget-head">Search filters</h3>
	<div class="widget-content">
		<ul id="accordion" class="accordion">
			<li>
				<h3><a href="#">Basic Search  options</a></h3>
				<div class="accordion-panel active">
					<div class="control-group">
						<label class="control-label">Manufacturer:</label>
						<div class="controls">
							<select class="dropdown">
								<option selected="selected">Germany</option>
								<option>Japan</option>
								<option>Korea</option>
								<option>United States</option>
								<option>Australia</option>
								<option>China</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Model:</label>
						<div class="controls">
							<select class="dropdown">
								<option selected="selected">Select</option>
								<option>2010</option>
								<option>2011</option>
								<option>2012</option>
								<option>2013</option>
								<option>2014</option>
							</select> </div>
					</div>
					<div class="control-group">
						<div class="cell-6">
							<label class="control-label">Min price:</label>
							<div class="controls">
								<select class="dropdown">
								<option selected="selected">Select</option>
								<option>10,000</option>
								<option>20,000</option>
								<option>50,000</option>
								<option>100,000</option>
								</select> </div>
						</div>
						<div class="cell-6">
							<label class="control-label">Max price:</label>
							<div class="controls">
								<select class="dropdown">
								<option selected="selected">Select</option>
								<option>10,000</option>
								<option>20,000</option>
								<option>50,000</option>
								<option>100,000</option>
								</select> </div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Color:</label>
						<div class="controls">
							<select class="dropdown">
								<option selected="selected">Select</option>
								<option>Red</option>
								<option>Black</option>
								<option>White</option>
								<option>Green</option>
								<option>Blue</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<div class="cell-6">
							<label class="control-label">Min Year:</label>
							<div class="controls">
								<select class="dropdown">
								<option selected="selected">Select</option>
								<option>2000</option>
								<option>2001</option>
								<option>2002</option>
								<option>2003</option>
								</select> </div>
						</div>
						<div class="cell-6">
							<label class="control-label">Max year:</label>
							<div class="controls">
								<select class="dropdown">
								<option selected="selected">Select</option>
								<option>2000</option>
								<option>2001</option>
								<option>2002</option>
								<option>2003</option>
								</select> </div>
						</div>
					</div>
				</div>
			</li>
			<li>
				<h3><a href="#">Other options:</a></h3>
				<div class="accordion-panel active">
					<div class="control-group">
						<label class="checkbox">
							<input type="checkbox">New Sales
						</label>
						<label class="checkbox">
							<input type="checkbox">Only in USA
						</label>
						<label class="checkbox">
							<input type="checkbox">Refine search
						</label>
						<label class="checkbox">
							<input type="checkbox">State
						</label>
						<label class="checkbox">
							<input type="checkbox">For rent
						</label>
						<label class="checkbox">
							<input type="checkbox">Just black
						</label>
						<label class="checkbox">
							<input type="checkbox">Low price
						</label>
					</div>
				</div>
			</li>
			<li>
				<h3><a href="#">Please select:</a></h3>
				<div class="accordion-panel active">
					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
								<input checked type="radio" value="option1">great
							</label>
							<label class="checkbox">
								<input type="radio" value="option2">bad
							</label>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<input type="submit" class="btn btn-medium main-bg" value="Search"/>
	</div>
</div> -->