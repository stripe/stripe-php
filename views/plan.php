<?php __getHeader();

$customerEmail = $_COOKIE['customerEmail'];
$productName = $_COOKIE['productName'];
$customerID = $_COOKIE['customerID'];
$currency = 'aud';

$products = array (
    array('product_name'=>$productName,'product_price' => '997', 'currency' => $currency, 'description'=>'One time payment $997+GST'),
    array('product_name'=>$productName,'product_price' => '399', 'currency' => $currency, 'description'=>'Three months payment $320/month + GST'),
);

$obj = '';

?>

<div class="container mx-auto minimalWidth pt-5">

    <h1 class="text-center mb-2">Select Payment Method</h1>
    <h3 class="text-center mb-4"> <?=$customerEmail;?></h3>

    <div class="planWrapper">



        <?php

            foreach($products as $p => $product){

                $productDescription = $product['description'];
                $productPrice = $product['product_price'];

                $obj .= '<form action="order" method="post">';
                $obj .= "<label class='w-100 mb-3 planOption' for='plan_".$p."'>";
                $obj .= "<div class='p-3'>";
                $obj .= "<div class='planOptionContent'>";
                $obj .= "<h4>$productName</h4>";
                $obj .= "<p class='mb-3'>$productDescription</p>";
                $obj .= "</div>";
                $obj .= "";

                $obj .= '<button type="submit" class="btn btn-primary mb-2 p-2 btn-lg w-100">Place Order</button>';
                $obj .= "</div>";
                $obj .= "</label>";

                $obj .= "<input type='hidden' value='$productName' name='product_name'/>";
                $obj .= "<input type='hidden' value='$productPrice' name='product_price'/>";
                $obj .= "<input type='hidden' value='$productDescription' name='product_description'/>";

                $obj .= '</form>';

            }

            echo $obj;

        ?>

        <a href="/end-session/" class="btn btn-link p-3 btn-lg w-100" role="button" aria-disabled="true">Cancel Order</a>

    </div>

</div>

<?php __getFooter(); ?>
