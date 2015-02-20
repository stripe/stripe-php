<?php

/**
 * @param string $class_name
 */
function stripe_api_autoload($class_name) {
	$name_prefix = 'Stripe\\'; // The namespace prefix
	$base = __DIR__ . '/lib/'; // Directory for the namespace
	if(strpos($class_name, $name_prefix) != 0) // Check if the class belongs in the namespace
	{
		return; // Does not belong to the namespace, skip
	}
	$class_file = $base . str_replace('\\', '/', substr($class_name, strlen($name_prefix))) . '.php'; // Get the unprefixed class's file
	if(file_exists($class_file)) // Check if the file exists
	{
		require $class_file;
	}
}
spl_autoload_register('stripe_api_autoload');
