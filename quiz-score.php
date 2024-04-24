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
            padding-top: 50px;
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
               <div class="navbar-brand">NEUPaperTrail</div>
            </div>

         </div>
      </nav>
      
      <!-- Title Part And Content -->

      <div class="container-fluid">  
         <section class="d-flex align-items-center justify-content-center">
            <div class="text-center">

               <?php

                  session_start();                  
                  $customInfo = $_SESSION['customInfo'];
                  $title = $customInfo['title'];
                  $score = $_POST['score'];
                  $noOfQuestions = $_POST['noOfQuestions'];
                  $percentage = ($score / $noOfQuestions) * 100;

                  echo "
                     <div id='quiz-header'>
                        <h1 class='page-header'>$title</h1>
                     </div>

                     <br/>

                     <h3>YOUR SCORE:</h3>
                     <h1>$percentage%</h1>
                     <h3>$score out of $noOfQuestions</h3>

                     <br/> <br/> <br/> <br/>

                  ";


               ?>

               <form action="generating.php">
                  <div class="col-md-2 col-md-offset-5">
                     <button type="submit" class="btn-block">Retake</button>
                  </div>
               </form>

            </div>
         </section>
      </div>

      <footer class="navbar navbar-default navbar-fixed-bottom">
         <div class="container">
            <p class="text-center" style="padding: 10px;">© 2024 Automated Exam. All rights reserved.</p>
         </div>
      </footer>

   </body>
</html>