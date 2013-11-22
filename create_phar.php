<?php
$path = dirname(__FILE__)."/";

$phar = new Phar($path."Stripe.phar", 0, "Stripe.phar");
$phar->buildFromDirectory($path."lib/");
$phar->setStub($phar->createDefaultStub('Stripe.php'));
?>

