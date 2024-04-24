<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
        // Handle file uploads

        $uploadedFiles = array();

        foreach ($_FILES['files']['tmp_name'] as $index => $tmpName) {
            $fileName = $_FILES['files']['name'][$index];
            $uploadDir = 'uploads/'; // Specify the destination directory
            $uploadPath = $uploadDir . $fileName;

        // Move the uploaded file to the destination directory
            if (move_uploaded_file($tmpName, $uploadPath)) {
                $uploadedFiles[] = array(
                    'name' => $fileName,
                    'path' => $uploadPath
                );
            }
        }

        if (!empty($uploadedFiles)) {
            echo "<ul>";
            foreach ($uploadedFiles as $file) {
                echo "<li style='
                    width: 80%;
                    height: fit-content;
                    padding: 5px 10px 5px 10px;
                    margin: 10px;
                    background-color: #FFFFFF;
                    color: #000000;
                    border-radius: 5px;
                    '>
                    {$file['name']}
                    </li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No files uploaded.</p>";
        }

    }

?>
