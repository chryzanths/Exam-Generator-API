<?php

    // Define the path to the uploads folder
    $uploadsFolder = 'uploads/';

    // Get a list of all files in the uploads folder
    $uploadfiles = glob($uploadsFolder . '*');

    // Loop through each file and delete it
    foreach ($uploadfiles as $file) {
        // Check if the path is a file (not a directory)
        if (is_file($file)) {
            // Delete the file
            unlink($file);
        }
    }

    // Define the path to the session folder
    $sessionFolder = 'C:/xampp/tmp';

    // Get a list of all files in the session folder
    $sessionfiles = scandir($sessionFolder);

    // Loop through each file and delete it
    foreach ($sessionfiles as $file) {
        // Check if the path is a file (not a directory) and is a session file
        if (is_file($sessionFolder . '/' . $file)) {
            // Delete the session file
            if (!unlink($sessionFolder . '/' . $file)) {
                echo "Error deleting file: " . $sessionFolder . '/' . $file;
            }
        }
    }

?>
