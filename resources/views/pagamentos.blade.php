<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{url('css/pagamentos.css')}}">

</head>
<body>

<h1 class="premiumH1">Please fill out this form in order to print your receipt</h1>


<a href="{{ route('home') }}"><button class="myButton">Back to HomePage</button></a>

<div class="container">

    <form method="Get" action="{{ route('receive_pagamentos') }}" >

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
             <input type="Submit" value="See Receipt"></input>
    </form>

</div>    
    
</body>
</html>