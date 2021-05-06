<?php

$text= $_POST['text'];
$key= $_POST['key'];

//echo "$text";
//echo "$key";

// A PHP program to illustrate Caesar
// Cipher Technique

// This function receives text and shift
// and returns the encrypted text
function encrypt($text, $key)
{
	$result = "";

	// traverse text
	for ($i = 0; $i < strlen($text); $i++)
	{
		// apply transformation to each
		// character Encrypt Uppercase letters
		if (ctype_upper($text[$i]))
			$result = $result.chr((ord($text[$i]) +
							$key - 65) % 26 + 65);

	// Encrypt Lowercase letters
	else
		$result = $result.chr((ord($text[$i]) +
						$key - 97) % 26 + 97);
	}

	// Return the resulting string
	return $result;
}

// Driver Code
//$text = "ATTACKATONCE";

$key = $key;
echo nl2br("Text : " . $text . "\n\n");
echo nl2br("Shift or Key: " . $key. "\n\n");
echo "Cipher: " . encrypt($text, $key);

// This code is contributed by ita_c
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
<button id="cs_decrypt" class="topright submit-button" >Want to Decrypt?</button>

<script type="text/javascript">
    document.getElementById("cs_decrypt").onclick = function () {
        location.href = "csdecrypt.html";
    };
</script>