<?php

    session_start();

    // Define the path to the uploads folder
    $uploadsFolder = 'uploads/';

    // Get a list of all files in the uploads folder
    $files = glob($uploadsFolder . '*');

    // Loop through each file and delete it
    foreach ($files as $file) {
        // Check if the path is a file (not a directory)
        if (is_file($file)) {
            // Delete the file
            unlink($file);
        }
    }

    echo '<script>';
    echo 'var list = document.querySelector("ul");'; // Replace yourIframeId with the actual ID of your iframe
    echo 'list.innerHTML = "";'; // Clear the content of the iframe
    echo '</script>';

    // Optionally, you can also remove the session variable if needed
    unset($_SESSION['uploaded_files']);
    session_destroy();

?>

