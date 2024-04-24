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

         #correctAnswerContainer {
            background: #C1E1C1;
            border: 1px solid #023020;
            border-radius: 5px;
            margin-top: 20px;
            margin-bottom: 20px;
         }

         .correct {
            border: 1px solid #023020;
         }

         .wrong {
            border: 1px solid #4A0404;
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

      <!-- Use javascript to automatically put details -->

      <div class="container-fluid">  
         <section class="d-flex align-items-center justify-content-center">

            <div>
               <h1 id="header" class="page-header"></h1>
            </div>

            <br/>

            <div>
               <h3 id="question" class="text-center">Insert question here.</h4>
               <br/>
               <div class="col-md-6 col-md-offset-3">
                  <input id="answerContainer" type="text" placeholder="Enter your answer" class="form-control">
               </div>
               <div id="correctAnswer" style="display: none;">
                  <br/> <br/>
                  //this is where the correct answer will show
               </div>
               <br/> <br/> <br/> <br/>
               <div class="col-md-2 col-md-offset-3">
                  <button id="submit-button" type="button" class="btn btn-block">Submit</button>
               </div>
               <div id="button-container">
                  <div class="col-md-2 col-md-offset-2">
                     <button id="next-button" type="button" class="btn btn-block" disabled onclick="nextQuestion()">Next</button>
                  </div>
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
   <script src="js/script-des.js"></script>
</html>