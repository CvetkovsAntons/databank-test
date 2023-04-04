<?php
// NumberArray class will store all data and logic related to the arrays, and password
class NumberArray
{
		private array $array;
		private array $primeNumbers = array(); // declare $primeNumbers as an empty array
		private array $palindromes = array(); // declare $palindromes as an empty array
		private string $password = ""; // declare $password as an empty string

		public function __construct(int $n, int $k)
		{
				$this->array = range(1, $n); // declaring an $array as an array of numbers from 1 till the users input value
				$this->setPrimeNumbers(); // calling a function that will fill up $primeNumbers array with prime numbers
				$this->setPalindromes();  // calling a function that will fill up $palindromes array with palindromes
				$this->setPassword($k);
		}

		private	function isPrime(int $num) : bool // function is prime is validating if number is prime or not
		{
				if ($num <= 1) // prime numbers starts from 2 and above
				{
						return false;
				}

				if ($num == 2)
				{
						return true;
				}

				for ($i = 2; $i < $num; $i++) // for that goes through all numbers from 2 till the $num value
				{
						if ($num % $i == 0) // if number can be divided to any other number exclude 1 and itself, then it's not a prime number
						{
								return false;
						}
				}

				return true;
		}
		
		public function getPrimeNumbers() : array // function that returns an array of prime numbers
		{
				return $this->primeNumbers;
		}

		private function setPrimeNumbers() : void // function that fills out the $primeNumbers array
		{
				foreach ($this->array as $num) // foreach loop that goes through all $array values
				{
						if ($this->isPrime($num) == true) // if number is prime, then adding it to the $primeNumbers array
						{
								array_push($this->primeNumbers, $num);
						}
				}
		}

		public function getPalindromes() : array // function that returns an array of palindromes
		{
				return $this->palindromes;
		}

		private function setPalindromes() : void // function that fills out the $palindromes array
		{
				foreach ($this->array as $num) // going through each value of the $array
				{
						$stringNum = (string)$num; // converting $num to string
						$reversedNum = strrev($stringNum); // reversing it

						if ($stringNum == $reversedNum) // if number is a palindrome, then it reversed value should be equal to the original one
						{
								array_push($this->palindromes, $num); // print palindrome
						}
				}
		}

		public function getPassword() : string // function that returns password
		{
				return $this->password;
		}

		private function setPassword(int $k) : void // function that sets a password value
		{
				while (strlen($this->password) != $k) // password length should be equal to $k
				{
						do {
								$randomKey = array_rand($this->primeNumbers); // getting a random index from the $primeNumbers array
								$num = (string)$this->primeNumbers[$randomKey]; // getting a value that is stored in generated previously index
						} while (strlen($num) > $k - strlen($this->password)); // if value is too long
						// example: $k = 3, first we add the value of 11, then length of the password value is 2
						// second time we get 22, the length of a password should be 3, we already have taken 2 spots,
						// so we can add to the password only value with length of 3-2 = 1, it means that we can't add 22 to the password,
						// so we get one more value, for example 3, we can add it to the password and the password will be equal to 113

						$this->password = $this->password . $num; // adding value to the password
				}
		}
}