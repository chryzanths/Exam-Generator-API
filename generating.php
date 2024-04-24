<!DOCTYPE html>
<html>
   <head>
      <title>Exam Gen</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>

      <style>

         body {
            padding-bottom: 100px;
            padding-top: 100px;
         }

         section {
            height: 80%;
            width: 100%;
            padding: 50px;
         }

         
         button {
            border-radius: 10px;
            background: #000000;
            color: #FFFFFF;
            padding: 5px;
         }

      </style>

   </head>

   <body>
      
      <?php
         
         session_start();

         if(!empty($_POST)){

            $title = $_POST['title'];
            $easy = $_POST['easy'];
            $average = $_POST['average'] - $easy;
            $difficult = 100 - $_POST['average'];
            $type = $_POST['type'];
            $items = $_POST['items'];

            $customInfo = [
               'title' => $title,
               'easy' => $easy,
               'average' => $average,
               'difficult' => $difficult,
               'type' => $type,
               'items' => $items
            ];

            $_SESSION['customInfo'] = $customInfo;

         }

      ?>

      <!-- Navbar -->

      <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 50px;">
         <div class="container">

            <div class="navbar-header">
               <div class="navbar-brand">NEUPaperTrail</div>
            </div>

         </div>
      </nav>
      
      <!-- Title Part And Content-->

      <div class="container-fluid">  
         <section class="d-flex align-items-center justify-content-center">
            <div class="text-center">

               <h1><strong>Generating Exam...</strong></h1>
               <p>Please wait for a moment.</p>

               <br/>

               <?php

                  $customInfo = $_SESSION['customInfo'];

                  switch($customInfo['type']) {
                     case "mcq":
                        $next_page = "quiz-mcq.php";
                        break;
                     case "tof":
                        $next_page = "quiz-tof.php";
                        break;
                     case "des":
                        $next_page = "quiz-des.php";
                        break;
                  }

                  echo "<form action='$next_page'>
                           <div class='col-md-2 col-md-offset-5'>
                              <button type='submit' class='btn btn-block'>Take Quiz</button>
                           </div>
                        </form>"

               ?>

            </div>
         </section>

         <section>
            <?php
               
               $customInfo = $_SESSION['customInfo'];

               $title = $customInfo['title'];
               $easy = $customInfo['easy'];
               $average = $customInfo['average'];
               $difficult = $customInfo['difficult'];
               $type = $customInfo['type'];
               $items = $customInfo['items'];

               switch($type) {
                  case "mcq":
                     $q_type = "Multiple Choice";
                     break;
                  case "des":
                     $q_type = "Descriptive";
                     break;
                  case "tof":
                     $q_type = "True or False";
                     break;
               }

               echo "<div class='text-center'>";
               echo "<h3><strong>Title: </strong></h3><h4>$title</h4>";
               echo "<h3><strong>Difficulty:</strong></h3>";
               echo "<h4><strong>Easy = </strong>$easy% </h4>";
               echo "<h4><strong>Average = </strong>$average% </h4>";
               echo "<h4><strong>Difficult = </strong>$difficult% </h4><br/>";
               echo "<h3><strong>Quiz Type: </strong></h3><h4>$q_type </h4>";
               echo "<h3><strong>Number of Questions: </strong></h3><h4>$items</h4>";
               echo "</div>";

            ?>
         </section>

      </div>

      <footer class="navbar navbar-default navbar-fixed-bottom">
         <div class="container">
            <p class="text-center" style="padding: 10px;">© 2024 Automated Exam. All rights reserved.</p>
         </div>
      </footer>

   </body>
</html>