<?php
// Set content type to JSON
header('Content-Type: application/json');

// Create the token data array
$tokenData = [
    "id" => 15258253,
    "name" => "testToken",
    "revoked" => false,
    "created_at" => "2025-07-13T14:15:40.298Z",
    "description" => "",
    "scopes" => [
        "api",
        "read_api"
    ],
    "user_id" => 29036205,
    "last_used_at" => "2025-07-13T14:19:03.083Z",
    "active" => true,
    "expires_at" => "2025-08-12",
    "last_used_ips" => []
];

// Return JSON response
echo json_encode($tokenData, JSON_PRETTY_PRINT);
?>
