<style type="text/css">
	.category_fix_menu {
	    position: fixed;
	    z-index: 1;
	    top: 120px;
	}
	.category_fix_menu div ul li {
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
</style>
<div class="widget blog-cat-w fx" id="menu_page_category" data-animate="fadeInLeft">
	<h3 class="widget-head">categories</h3>
	<div class="widget-content">
		<ul class="list list-ok alt">
			<li class="active"><a class="menu_page_category" href="#pro1">Starters</a><span>[250]</span></li>
			<li><a class="menu_page_category"  href="#pro2">Main Courses</a><span>[112]</span></li>
			<li><a class="menu_page_category"  href="#pro3">Special Presentation</a><span>[150]</span></li>
			<li><a class="menu_page_category"  href="#pro4">Executive Meals</a><span>[150]</span></li>
			<li><a class="menu_page_category"  href="#pro5">Pizza</a><span>[150]</span></li>
			<li><a class="menu_page_category"  href="#pro6">Traditional Set Menu</a><span>[150]</span></li>

			@if(count($category)>0)
				@foreach($category as $cat)
					<li><a class="menu_page_category"  href="#pro6{{$cat->id}}">{{$cat->name}}</a><span>[{{$cat->product}}]</span></li>
				@endforeach
			@endif

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