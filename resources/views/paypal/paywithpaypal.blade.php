<!DOCTYPE html>
<html>
<head>
	<title>Paypal Intregation</title>
	<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="w3-container">
		@if($message=Session::get('success'))
			<div class="w3-panel w3-green w3-display-container">
				{{Session::get('success')}}
			</div>
		@endif

		@if($message=Session::get('error'))
			<div class="w3-panel w3-red w3-display-container">
				{{Session::get('error')}}
			</div>
		@endif


		<form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form"  action="{!!URL::to('paypal')!!}">
			<div class="w3-container w3-teal w3-padding-16"> Pay with Paypal </div>
			{{csrf_field()}}
			<h2 class="w3-text-blue">Payment Form</h2>
			<p>Demo paypal form - intregating paypal with laravel</p>
			<label class="w3-text-blue"><b>Enter Amount</b></label>
			<input type="text" name="amount" id="amount" class="w3-input w3-border">
			<button class="w3-btn w3-blue">Paywith Paypal</button>
		</form>
	</div>
</body>
</html>