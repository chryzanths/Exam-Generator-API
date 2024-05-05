<?php
$directory = 'uploads/';
$files = scandir($directory);

// Exclude . and .. from the list of files
$files = array_diff($files, array('.', '..'));

if (empty($files)) {
    // Directory is empty
    http_response_code(204); // No content
} else {
    // Directory is not empty
    http_response_code(200); // OK
}
?>
