<?php
__getHeader();

if(!isset($_COOKIE['productPrice'])){

    setcookie('productPrice', $_POST['product_price'], time()+60*60*24, "/", "localhost");

}

if(!isset($_COOKIE['productDescription'])){

    setcookie('productDescription', $_POST['product_description'], time()+60*60*24, "/", "localhost");

}

@$productName            = $_COOKIE['productName'];
@$productPrice           = $_COOKIE['productPrice'];
@$productDescription     = $_COOKIE['productDescription'];
@$customerEmail          = $_COOKIE['customerEmail'];
@$customerDetails        = $_COOKIE['customerDetails'];

if(!isset($productPrice) || !isset($productDescription) ){

    header("Refresh: 0");
}


?>

<!-- Display a payment form -->
<div class="minimalWidth mx-auto pt-5">

<h1 class="text-center mb-2">Confirm Payment</h1>
    <h4 class="text-center mb-4"> <?=$customerEmail;?></h4>


    <div class="w-100 mb-3 planOption p-3">
    <h4><?=$productName;?></h4>
    <p class='mb-0'><?=$productDescription?></p>
    </div>
    <form method="post" action="payment" id="payment-form" class="mb-3">

        <div class="form-group mb-3">
        <label class="sr-only" for="card-holder">Cardholder Name</label>

        <input class="form-control form-control-lg" name="cardholder-name" type="text" placeholder="Cardholder Name" id="card-holder" value="<?=$customerDetails?>">
        </div>

    <div class="card-element-wrapper rounded">

        <div id="card-element" class="p-4"></div>

      <button class="btn btn-primary w-100 p-3 btn-lg rounded-0" id="submit">
        <div class="spinner hidden" id="spinner"></div>
        <span id="button-text">Subscribe</span>
      </button>
      </div>


      <div class="outcome">
      <div class="error" role="alert"></div>
      <div class="success">Success! Your Stripe token is <span class="token"></span>
      </div>


        </form>
        <div class="text-divider"><span>OR</span></div>
        <a href="/end-session/" class="btn btn-dark p-3 btn-lg w-100" role="button" aria-disabled="true">Cancel Order</a>

</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="/assets/js/addons.js"></script>

<?php __getFooter(); ?>
