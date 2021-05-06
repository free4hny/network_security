<?php

$cipher= $_POST['cipher'];
$key= $_POST['key'];

function Cipher($cipher, $key)
{
	if (!ctype_alpha($cipher))
		return $cipher;

	$offset = ord(ctype_upper($cipher) ? 'A' : 'a');
	return chr(fmod(((ord($cipher) + $key) - $offset), 26) + $offset);
}

function Encipher($input, $key)
{
	$output = "";

	$inputArr = str_split($input);
	foreach ($inputArr as $cipher)
		$output .= Cipher($cipher, $key);

	return $output;
}

function Decipher($input, $key)
{
	return Encipher($input, 26 - $key);
}

$text = $cipher;
$cipherText = Encipher($text, $key);
$plainText = Decipher($text, $key);

$plainText =  strtr($plainText, ['T' => ' ', '[' => ' ', ']'=> ' ', "/"=>" ", "\\"=>' ', '^'=>' ']);


//echo "$test";

//echo nl2br("Text: ". $text . "\n\n");
echo nl2br("Cipher Text :  " .$text. "\n\n");
echo nl2br("Plain Text :   " .$plainText. "\n\n")

?>

