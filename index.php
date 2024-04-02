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
            height: fit-content;
            width: 100%;
            padding: 50px;
         }

         .box {
            min-height: 300px;
            background: #000000;
            border-radius: 25px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 10px;
         }

         .sm-box {
            height: fit-content;
            padding: 5px;
            background-color: #FFFFFF;
            color: #000000;
            border-radius: 5px;
         }
         
         button {
            border-radius: 10px;
            background: #000000;
            color: #FFFFFF;
            padding: 5px;
         }

         p{
            margin: 0;
         }

         .txt-black {
            color: #000000;
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
      
      <!-- Title Part And File Upload-->

      <div class="container-fluid">  

         <section class="d-flex align-items-center justify-content-center row">

            <div class="text-center">
               <h1>Automated Exam Generator</h1>
               <p>Select PDF files to upload (max. 1MB)</p>

               <br/>
               
               <div class="col-md-6 col-md-offset-3">
                  <input type="file" placeholder="Upload File" class="form-control">
               </div>

               <br/><br/><br/>

               <div class="col-md-2 col-md-offset-5">
                  <button type="button" class="btn-block">Upload</button>
               </div>
            </div>  

         </section>
         
         <!-- Files Uploaded -->

         <section class="row">
            <div class="container-fluid box col-md-6 col-md-offset-3">
               <h3 class="text-center" style="color: #FFFFFF;">Files Uploaded</h3>

               <div id="files-container">

                  <!-- Insert file uploaded here via javascript. Sample below -->

                  <div>
                     <div class="alert sm-box text-center"><a href="#" class="close txt-black" data-dismiss="alert">&times;</a>File.pdf</div>
                  </div>

               </div>

            </div>
         </section>

         <!-- Customization -->

         <section class="row">
            <div class="text-center">
               <h2>Exam Customization</h2>
               <p>Edit difficulty and question type to be generated.</p>
            </div>
            
            <br/>

            <form class="form-horizontal">

               <div class="form-group">
                  <label class="control-label col-md-2 col-md-offset-1">Title</label>
                  <div class="col-md-7">
                     <input type="text" class="form-control">
                  </div>
               </div>

               <h4 class="text-center">Difficulty</h4>

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Easy</label>
                  <div class="col-md-7">
                     <input type="text" class="form-control" placeholder="%">
                  </div>
               </div>

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Medium</label>
                  <div class="col-md-7">
                     <input type="text" class="form-control" placeholder="%">
                  </div>
               </div>

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Hard</label>
                  <div class="col-md-7">
                     <input type="text" class="form-control" placeholder="%">
                  </div>
               </div>

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Question Type</label>
                  <div class="col-md-7">
                     <div class="radio">
                        <label><input type="radio" name="gender">Multiple Choice</label>
                        <label><input type="radio" name="gender">Descriptive</label>
                        <label><input type="radio" name="gender">True or False</label>
                     </div>
                  </div>
               </div>

               <!-- Vertical Question Type -->

               <!--

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Question Type</label>

                  <div class="col-md-7">
                     <div class="radio">
                        <label><input type="radio" name="gender">Multiple Choice</label>
                     </div>
                  </div>

                  <div class="col-md-7">
                     <div class="radio">
                        <label><input type="radio" name="gender">Descriptive</label>
                     </div>
                  </div>

                  <div class="col-md-7">
                     <div class="radio">
                        <label><input type="radio" name="gender">True or False</label>
                     </div>
                  </div>

               </div>

               -->

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Number of Items</label>
                  <div class="col-md-7">
                     <input type="number" class="form-control" placeholder="1-100" min="1" max="100">
                  </div>
               </div>

               <div class="form-group">
                  <div class="col-md-2 col-md-offset-5">
                     <button class="btn-block">Generate</button>
                  </div>
               </div>
               
            </form>
            
         </section>

      </div>

      <footer class="navbar navbar-default navbar-fixed-bottom">
         <div class="container">
            <p class="text-center" style="padding: 10px;">© 2024 Automated Exam. All rights reserved.</p>
         </div>
      </footer>

   </body>
</html>