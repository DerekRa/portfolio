<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tokenz {

        function encrypt( $string ) {
				  // $algorithm = 'serpent-128'; // You can use any of the available
				  $algorithm = 'rijndael-192'; // You can use any of the available
				  $key = md5( "kenzoupass", true); // bynary raw 16 byte dimension.
				  $iv_length = mcrypt_get_iv_size( $algorithm, MCRYPT_MODE_CBC );
				  $iv = mcrypt_create_iv( $iv_length, MCRYPT_RAND );
				  $encrypted = mcrypt_encrypt( $algorithm, $key, $string, MCRYPT_MODE_CBC, $iv );
				  $result = base64_encode( $iv . $encrypted );
				  return $result;
				}
				function decrypt( $string ) {
				  $algorithm =  'rijndael-192';
				  // $algorithm =  'serpent-128';
				  $key = md5( "kenzoupass", true );
				  $iv_length = mcrypt_get_iv_size( $algorithm, MCRYPT_MODE_CBC );
				  $string = base64_decode( $string );
				  $iv = substr( $string, 0, $iv_length );
				  $encrypted = substr( $string, $iv_length );
				  $result = mcrypt_decrypt( $algorithm, $key, $encrypted, MCRYPT_MODE_CBC, $iv );
				  return $result;
				}

				function encrypt_string($input)
				{
				    $inputlen = strlen($input);// Counts number characters in string $input
				    $randkey = rand(1, 9); // Gets a random number between 1 and 9
				 
				    $i = 0;
				    $inputchr = array();
				    while ($i < $inputlen)
				    {
				 
				        $inputchr[$i] = (ord($input[$i]) - $randkey);//encrpytion 
				 
				        $i++; // For the loop to function
				    }
				 
						//Puts the $inputchr array togtheir in a string with the $randkey add to the end of the string
				    $encrypted = implode('.', $inputchr) . '.' . (ord($randkey)+50);
				    return $encrypted;
				}
				 
				function decrypt_string($input)
				{
				  $input_count = strlen($input);
				 
				  $dec = explode(".", $input);// splits up the string to any array
				  $x = count($dec);
				  $y = $x-1;// To get the key of the last bit in the array 
				 
				  $calc = $dec[$y]-50;
				  $randkey = chr($calc);// works out the randkey number
				 
				  $i = 0;
				 	$real = null;
				   while ($i < $y)
				  {
				 
				    $array[$i] = $dec[$i]+$randkey; // Works out the ascii characters actual numbers
				    $real .= chr($array[$i]); //The actual decryption
				 
				    $i++;
				  };
				 
					$input = $real;
					return $input;
				}
		}