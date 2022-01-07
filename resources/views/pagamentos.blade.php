<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{url('css/pagamentos.css')}}">

</head>
<body>

<h1 class="premiumH1">Premium Offer</h1>

<a href="{{ route('home') }}"><button class="myButton">Back to HomePage</button></a>

<div class="container">

    <form method="G" action="{{ route('receive_pagamentos') }}" >

        <div class="row">

            <div class="col">

                <div class="inputBox">
                <span>Total (EUR)</span>
                    <strong>6.99€</strong>
                </div>
                <div class="inputBox">
                <span>Username</span>
                <input type="text" name="username" placeholder="" value="{{ auth()->user()->name }}" readonly> </input>
                </div>
                <div class="inputBox">
                <span>Full Name</span>
                    <?php 
                    ?>
                     <input type="text" class="form-control" placeholder="Insert your full name" required="" name="name"> </input>
                </div>


                

            </div>

            <div class="col">

                <div class="inputBox">         
                    <span>Street</span>
                    <input type="text" class="form-control" placeholder="Insert your street name" required="" name="streetName"> </input>
                </div>
                <div class="inputBox">
                    <span>Zip Code</span>
                    <input type="text" class="form-control" placeholder="Insert your zip code" name="zipcode"></input>
                </div>
                <div class="inputBox">
                    <span>Email</span>
                    <input type="text" name="email" placeholder="" value="{{ auth()->user()->email }}" readonly> </input>
                </div>
              

            </div>
    
        </div>

        <form action="" method="POST">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51I4PU2BsU9Mtmw64MPQcKvJzIGfCXWzg1CU0k7u9B39HIWjHiSd59pwmuGWPXSawnXe6EBVPhiTJ4Z7nNJZSwC8p00WiK1k3fi" data-amount="{{6.99 * 100}} " data-name="Online Store" data-description="Payment" data-locale="auto" data-currency="eur">
                    </script>
                </form>

    </form>

</div>    
    
</body>
</html>