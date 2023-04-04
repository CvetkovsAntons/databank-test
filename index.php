<?php

declare(strict_types=1);

require_once "./inc/bootstrap.php";

$input = new UserInput(); // input class that controls users input logic
$array = new NumberArray($input->inputN(), $input->inputK()); // array class that will store all data such as: numbers array, prime numbers array and password

echo "Prime numbers array: "; // output the prime numbers array
foreach ($array->getPrimeNumbers() as $value) {
		echo $value . ' ';
}

echo "\n\n";

$array->printPalindromes(); // calling a function that prints all palindromes from array

echo "\n\n";

echo "Password: " . $array->getPassword() . "\n"; // output a password
echo "Password length: " . strlen($array->getPassword()) . "\n"; // output the length of a password
