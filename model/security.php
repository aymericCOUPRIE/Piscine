<?php

class Security{

	//static function can be used without creating a class instance
	//Security class functions make harmless HTML tags

	// to use when Input data in DB
	//$string = user input from a form for example
	public static function bdd($string, $addcslashes=true, $escapestring=true){
		//Do not use this function with  $addcslashes=false 
		// and $escapestring=false or all security function will execute as if you specified nothing
		// if you still want to apply false and false dot call the function

		// check if the string is an integer
		if(ctype_digit($string)){
			$string = intval($string);
		}
		// other types
		elseif (!$addcslashes) {
			require('db.php');
			$string = mysqli_real_escape_string($co, $string); //Protect against special char
			return $string;
		}
		elseif (!$escapestring) {
			$string = addcslashes($string, '%_');
			return $string;
		}
		else{
			require('db.php');
			$string = mysqli_real_escape_string($co, $string); //Protect against special char
			$string = addcslashes($string, '%_');
		}
		return $string;
	}
	
	// to use when outputData form DB to site
	// $string = string taken form DB
	public static function html($string){
		return htmlentities($string); //Protect against html injection
	}
}