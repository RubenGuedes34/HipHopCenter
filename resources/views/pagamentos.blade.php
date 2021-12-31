

Premium Offer 
<form method="post" >
    <div>
        <div>
            <h4>
                <span>Our offer</span>
            </h4>
                <li>
                    <span>Total (EUR)</span>
                    <strong>6.99€</strong>
                </li>
            </ul>
        </div>
        <div>
            <h4>Billing address</h4>
         
                <div>
                    <label for="name">Name</label>
                    <?php 
                    ?>
                    <input type="text" name="name" placeholder="" value="{{ auth()->user()->name }}" readonly> </input>
                </div>
           
            <div>
                <label for="streetName">Street</label>
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" class="form-control" placeholder="Insert your street name" required="" name="streetName"> </input>
            </div>
            <div>
                <label for="zipcode">ZipCode</label>
                <input type="text" class="form-control" placeholder="Insert your zip code" name="zipcode"></input>
            </div>
            <div>
                <label for="doorNumber">Door Number</label>
                <input type="text" class="form-control" placeholder="Insert the number of your bulding" name="doorNumber"> </input>
            </div>
            <div>
                <label for="floor">Floor</label>
                <input type="text" class="form-control" placeholder="Insert only if you live in a bulding" name="floor"></input>
            </div>

     
            <hr class="mb-4">
            <div class="links">
                <form action="" method="POST">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51I4PU2BsU9Mtmw64MPQcKvJzIGfCXWzg1CU0k7u9B39HIWjHiSd59pwmuGWPXSawnXe6EBVPhiTJ4Z7nNJZSwC8p00WiK1k3fi" data-amount="{{6.99 * 100}} " data-name="Online Store" data-description="Payment" data-locale="auto" data-currency="eur">
                    </script>
                </form>
            </div>
</form>
</div>
</div>

