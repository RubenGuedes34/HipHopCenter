<head>

<link rel="stylesheet" type="text/css" href="{{url('css/receipt.css')}}">

</head>
<?php
$username=auth()->user()->name;
?>
<body>
<a href="{{ route('settings') }}"><button class="myButton">Back to Settings Page</button></a>
<form id="GFG" action="generate-pdf" method="GET">
<input type="hidden" name="username" value="{{ $username }}" />
<div class="receipt-content">
    <div class="container bootstrap snippets bootdey">
		<div class="row">
			<div class="col-md-12">
				<div class="invoice-wrapper">
					<div class="intro">
						Hi <strong>{{ $username }}</strong>, 
						<br>
						This is the receipt for a payment of <strong>6.99€</strong> (EUR) for 1 year subscription of HipHopCenter
					</div>

					<div class="payment-info">
						<div class="row">
							<div class="col-sm-6">
								<span>Payment No.</span>
								<strong>434334343</strong>
							</div>
							<div class="col-sm-6 text-right">
								<span>Payment Date</span>
								<strong id='date-time'></strong>
							</div>
						</div>
					</div>

					<div class="payment-details">
						<div class="row">
							<div class="col-sm-6">
								<span>Client</span>
								<strong>
								<input type="text" class="form-control" placeholder="Insert your full name" required name="name"> </input>
								</strong><br>
								<input type="text" class="form-control" placeholder="Insert your street name" required name="streetName"> </input> <br>
								<input type="text" class="form-control" placeholder="Insert your zip code" required name="zipcode"></input> <br>
								<input type="text" name="email" placeholder="" value="{{ auth()->user()->email }}" readonly> </input>  <br>
								
							</div>
						</div>
					</div>

					<div class="line-items">
						<div class="headers clearfix">
							<div class="row">
								<div class="col-xs-4">Description</div>
								<div class="col-xs-5 text-right">Amount</div>
							</div>
						</div>
						<div class="items">
							<div class="row item">
								<div class="col-xs-4 desc">
									1 Year Subscription
								</div>
								<div class="col-xs-5 amount text-right">
									6.99€
								</div>
							</div>
						</div>
						<div class="total text-right">
							<p class="extra-notes">
								<strong>Extra Notes</strong>
								You will be notifited 1 week before your subscription expires.
                                Make sure to renew your subscription or your Premium Status will be Downgraded.

							</p>
							<div class="field grand-total">
								Total <span>$6.99</span>
							</div>
						</div>

						<div class="print">
							
                            <a href="#" onclick="myFunction()">
								<i class="fa fa-print"></i>
								<input type="submit" value="Print this receipt">	
								
							</a>
</form>
							
						</div>
					</div>
				</div>

				<div class="footer">
					     Copyright © 2022. hiphopcenter
				</div>
			</div>
		</div>
	</div>
</div>                    
</body>
<script>
function myFunction() {
    document.getElementById("GFG").submit();
}
</script>
<script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>
