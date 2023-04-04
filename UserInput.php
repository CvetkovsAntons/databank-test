<?php
// UserInput class is controlling user input logic
class UserInput
{
		public static function inputN() : int // function for N (original array length) input
		{
				echo "Enter the length of array (must be integer >= 2): ";
				$input = fgets(STDIN);

				while (!filter_var($input, FILTER_VALIDATE_INT) || (int)$input < 2)
				{
						echo "ERROR! The wrong value was entered!\n\n";

						echo "Enter the length of array (must be integer > 2): ";
						$input = fgets(STDIN);
				}

				return (int)$input;
		}

		public static function inputK() : int // function for K (password length) input
		{
				echo "Enter the length of a password (must be integer >= 3): ";
				$input = fgets(STDIN);

				while (!filter_var($input, FILTER_VALIDATE_INT) || (int)$input < 3)
				{
						echo "ERROR! The wrong value was entered!\n\n";

						echo "Enter the length of a password (must be integer >= 3): ";
						$input = fgets(STDIN);
				}

				return (int)$input;
		}
}