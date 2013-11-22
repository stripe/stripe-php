<?php
$phar = new Phar("Stripe.phar", 0, "Stripe.phar");
$phar->buildFromDirectory("lib/");
$phar->setStub($phar->createDefaultStub('Stripe.php'));
?>

