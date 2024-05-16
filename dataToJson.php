<?php

    if (isset($_POST['content'])) {
        $content = $_POST['content'];
        $type = $_POST['type'];

        if($type == "mcq"){
            $filePath = "QandA/mcq/sample_mcq.json";
        } else if ($type == "owa"){
            $filePath = "QandA/des/sample_des.json";
        }

        file_put_contents($filePath, $content);
        
        echo "goods";
        // Process the received string (e.g., save it to a file, store in a database, etc.)
    } else {
        echo "error";
    }

?>