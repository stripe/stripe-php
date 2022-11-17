<?php __getHeader(); 

$index = basename(__FILE__);

?>

<div class="container mx-auto pt-5"  style="width:460px;">
<form method="POST" action="select-plan" class="needs-validation" novalidate>
  <div class="form-group mb-3">
  <h1 class="mb-3">The Content Retreat</h1>
  <h4 class="mb-3">You are about to purchase Content Retreat Subscription.</h4>
  <div class="alert alert-warning" role="alert">
  Please fill up the fields below.
</div>
  </div>
  <div class="form-group mb-3">
    <label for="full-name">Full Name</label>
    <input type="text" class="form-control p-3" id="full-name" name="full_name" placeholder="Enter Full Name" required>
    <div class="invalid-feedback">
      Please enter your full name.
    </div>
  </div>
  <div class="form-group mb-3">
    <label for="email-address">Email address</label>
    <input type="email" class="form-control p-3" id="email-address" aria-describedby="emailHelp" name="email_address" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    <div class="invalid-feedback">
      Please enter valid email address.
    </div>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary p-3 btn-lg w-100">Get Started</button>
</div>
  <input type="hidden" name="product_name" value="The Content Retreat">
</form>
</div>

<?php __getFooter(); ?>