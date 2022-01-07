<head>

<link rel="stylesheet" type="text/css" href="{{url('css/receipt.css')}}">

</head>
<?php
$username=$_GET['username'];
$name=$_GET['name'];
$streetName=$_GET['streetName'];
$zipcode=$_GET['zipcode'];
$email=$_GET['email'];

if(auth()->user()->type==0){
	$conn =  pg_connect("host=127.0.0.1 port=5432 dbname=HipHopCenter user=postgres password=postgres");
	$query = 'UPDATE public."users" SET type = 1 WHERE "users"."id"='. auth()->user()->id;
	$result = pg_query($conn,$query);

    
	if (!$result){
		echo "Update failed!!";
	}

}


?>
<body>
<a href="{{ route('settings') }}"><button class="myButton">Back to Settings Page</button></a>
<div class="receipt-content">
    <div class="container bootstrap snippets bootdey">
		<div class="row">
			<div class="col-md-12">
				<div class="invoice-wrapper">
					<div class="intro">
						Hi <strong>{{ $username }}</strong>, 
						<br>
						This is the receipt for a payment of <strong>6.99€</strong> (EUR) for 2 year subscription of HipHopCenter
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
                                     {{ $name }}
								</strong>
								<p>
                                    {{ $streetName }} <br>
									{{ $zipcode }} <br>
									{{ $email }}  <br>
								</p>
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
									2 Year Subscription
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

                        <form id="GFG" action="generate-pdf" method="GET">
                            <input type="hidden" name="username" value="{{ $username }}" />
                            <input type="hidden" name="name" value="{{ $name }}" />
                            <input type="hidden" name="streetName" value="{{ $streetName }}" />
                            <input type="hidden" name="zipcode" value="{{ $zipcode }}" />
                            <input type="hidden" name="email" value="{{ $email }}" />
                            <a href="#" onclick="myFunction()">
								<i class="fa fa-print"></i>
								Print this receipt
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
