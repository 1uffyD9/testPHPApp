<?php
// Set content type to JSON
header('Content-Type: application/json');

// Create the token data array
$tokenData = [
    "id" => 12345,
    "name" => "My Token",
    "revoked" => false,
    "created_at" => "2024-07-01T10:00:00.000Z",
    "scopes" => [
        "api",
        "read_user"
    ],
    "user_id" => 67890,
    "last_used_at" => "2024-07-03T14:30:00.000Z",
    "active" => true,
    "expires_at" => null
];

// Return JSON response
echo json_encode($tokenData, JSON_PRETTY_PRINT);
?>
