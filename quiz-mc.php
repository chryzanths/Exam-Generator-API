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
            padding: 10px 50px 10px 50px;
         }

         button {
            border-radius: 10px;
            background: #000000;
            color: #FFFFFF;
            padding: 5px;
         }

         .sm-box {
            height: fit-content;
            padding: 5px;
            background-color: #d3d3d3;
            color: #000000;
            border-radius: 5px;
         }

         .flex-box {
            padding: 10px;
            height: fit-content;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
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

      <!-- Use javascript to automatically put details -->

      <div class="container-fluid">  
         <section class="d-flex align-items-center justify-content-center">

            <div id="quiz-header">
               <h1 class="page-header">Title of Exam | Question 30 out of 30</h1>
            </div>

            <br/>

            <div>
               <h3 class="text-center">Insert question here.</h4>
               <br/>
               <div class="flex-box">
                  <button class="sm-box">A. answer 1</button>
                  <button class="sm-box">B. answer 2</button>
                  <button class="sm-box">C. answer 3</button>
                  <button class="sm-box">D. answer 4</button>
               </div>
               <br/>
               <div class="col-md-2 col-md-offset-5">
                  <button type="button" class="btn-block">Submit</button>
               </div>
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