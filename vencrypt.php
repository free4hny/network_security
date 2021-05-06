<?php


$text= $_POST['text'];
$key= $_POST['key']; 

function Mod($a, $b)
{
	return ($a % $b + $b) % $b;
}

function Cipher($text, $key, $encipher)
{
	$keyLen = strlen($key);

	for ($i = 0; $i < $keyLen; ++$i)
		if (!ctype_alpha($key[$i]))
			return ""; // Error

	$output = "";
	$nonAlphaCharCount = 0;
	$inputLen = strlen($text);

	for ($i = 0; $i < $inputLen; ++$i)
	{
		if (ctype_alpha($text[$i]))
		{
			$cIsUpper = ctype_upper($text[$i]);
			$offset = ord($cIsUpper ? 'A' : 'a');
			$keyIndex = ($i - $nonAlphaCharCount) % $keyLen;
			$k = ord($cIsUpper ? strtoupper($key[$keyIndex]) : strtolower($key[$keyIndex])) - $offset;
			$k = $encipher ? $k : -$k;
			$ch = chr((Mod(((ord($text[$i]) + $k) - $offset), 26)) + $offset);
			$output .= $ch;
		}
		else
		{
			$output .= $text[$i];
			++$nonAlphaCharCount;
		}
	}

	return $output;
}

function Encipher($text, $key)
{
	return Cipher($text, $key, true);
}

function Decipher($text, $key)
{
	return Cipher($text, $key, false);
}


$text = $text;
$cipherText = Encipher($text, $key);
$plainText = Decipher($cipherText, $key);

echo nl2br("Key is : $key"."\n\n");
echo "Cipher Text is : $cipherText";

?>

<style>
.topright {
  position: absolute;
  top: 8px;
  right: 16px;
  font-size: 18px;
  background-color: silver;
  color:green;
}
</style>
<button id="vig_decrypt" class="topright submit-button" >Want to Decrypt?</button>

<script type="text/javascript">
    document.getElementById("vig_decrypt").onclick = function () {
        location.href = "vdecrypt.html";
    };
</script>