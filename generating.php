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
      
      <!-- Navbar -->

      <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 50px;">
         <div class="container">

            <div class="navbar-header">
               <div class="navbar-brand">Prototype / Group Name</div>
            </div>

            <ul class="nav navbar-nav navbar-right">
               <li><a href="about.php">ABOUT</a></li>
            </ul>

         </div>
      </nav>
      
      <!-- Title Part And Content-->

      <div class="container-fluid">  
         <section class="d-flex align-items-center justify-content-center">
            <div class="text-center">

               <h1><strong>Generating Exam...</strong></h1>
               <p>Please wait for a moment.</p>

               <br/>

               <div class="col-md-2 col-md-offset-5">
                  <button type="button" class="btn btn-block disabled">Generating...</button>
               </div>

            </div>
         </section>

         <section>
            <?php

               $title = $_POST['title'];
               $easy = $_POST['easy'];
               $average = $_POST['average'] - $easy;
               $difficult = 100 - $_POST['average'];
               $type = $_POST['type'];
               $items = $_POST['items'];

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