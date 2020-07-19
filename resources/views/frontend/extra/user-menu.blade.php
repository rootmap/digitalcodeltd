<ul class="sidebar_widgets">			
	<li class="widget blog-cat-w fx" data-animate="fadeInLeft">
		<h3 class="widget-head">
			<span  style="color: #09f; font-weight: bolder;" href="{{url('user/dashboard')}}">Logged : {{Auth::user()->name}}</span>
		</h3>
		<div class="widget-content">
			<ul class="list list-ok alt">
				<li><a href="{{url('user/dashboard')}}">Dashboard</a></li>
				<li><a href="{{url('user/order/all')}}">All Order</a></li>
				<li><a href="{{url('user/order/paid')}}">Paid Order</a></li>
				<li><a href="{{url('user/order/pending')}}">Pending Order</a></li>
				<li><a href="{{url('user/order/rejected')}}">Rejected Order</a></li>
				<li><a href="{{url('user/profile')}}">Profile</a></li>
				<li><a href="{{url('user/change-password')}}">Change Password</a></li>
			</ul>
		</div>
	</li>
</ul>