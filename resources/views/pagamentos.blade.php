
@section ('title')
Premium Offer 
@endsection
@section ('content')
<?php $total = 0; ?>
<br>
<form method="post" >
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Our offer</span>
            </h4>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (EUR)</span>
                    <strong>6.99€</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="lastName">Name</label>
                    <?php 
                    ?>
                    <input type="text" class="form-control" name="name" placeholder="" value="{{ auth()->user()->name }}" readonly> </input>
                </div>
            </div>
            <div class="mb-3">
                <label for="username">Street</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" class="form-control" placeholder="Insert your street name" required="" name="streetName"> </input>
                </div>
            </div>
            <div class="mb-3">
                <label for="email">ZipCode</label>
                <input type="text" class="form-control" placeholder="Insert your zip code" name="zipcode"> </input>
            </div>
            <div class="mb-3">
                <label for="address">Door Number</label>
                <input type="text" class="form-control" placeholder="Insert the number of your bulding" name="doorNumber"> </input>
            </div>
            <div class="mb-3">
                <label for="address2">Floor</label>
                <input type="text" class="form-control" placeholder="Insert only if you live in a bulding" name="floor"></input>
            </div>

            <?php //<input type="checkbox" class="form-check-input" id="exampleCheck1" name = "payed"> 
            ?>
           <?php // <label class="form-check-label" for="exampleCheck1" name="">Payed</label> ?>

            <hr class="mb-4">
            <?php //<button class="btn btn-primary btn-lg btn-block" type="submit" href="">Order</button> ?>
            <div class="links">
                <form action="" method="POST">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51I4PU2BsU9Mtmw64MPQcKvJzIGfCXWzg1CU0k7u9B39HIWjHiSd59pwmuGWPXSawnXe6EBVPhiTJ4Z7nNJZSwC8p00WiK1k3fi" data-amount="{{$total * 100}} " data-name="Online Store" data-description="Payment" data-locale="auto" data-currency="eur">
                    </script>
                </form>
            </div>
</form>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br>

@endsection