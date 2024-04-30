<!DOCTYPE html>
<html>
   <head>
      <title>Exam Gen</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
      <link rel="stylesheet" href="css/slider.css">
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
         
         button {
            border-radius: 10px;
            background: #000000;
            color: #FFFFFF !important;
            padding: 5px;
         }

         .navbar-brand a {
            color: #FFFFFF !important;
         }

         .txt-black {
            color: #000000;
         }

         .heading {
            padding-bottom: 20px;
         }

         iframe {
            border-style: none;
            width: 100%;
            max-height: 500px;
         }


      </style>

      <script>
   
         var xhr = new XMLHttpRequest();
         xhr.open('GET', 'cleanup.php', true); // Synchronous request
         xhr.send();
           
      </script>

   </head>

   <body>
      
      <!-- Navbar -->

      <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 50px;">
         <div class="container">

            <div class="navbar-header">
               <div class="navbar-brand"><a href="index.php">NEUPaperTrail</a></div>
            </div>

            <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="index.php">HOME</a></li>
            </ul>

         </div>
      </nav>


      <!-- Title Part And File Upload-->

      <div class="container-fluid">  

         <section>

            <div class="text-center heading row">
               <h1 class="page-header">Automated Exam Generator</h1>
               
            </div>  

            <div class="row">

               <h4 class="text-center">Select PDF files to upload</h4>

               <br/>

               <form action="upload.php" method="POST" enctype="multipart/form-data" target="showUploads">

                  <div class="col-md-5 col-md-offset-3">
                     <input class="form-control" type="file" name="files[]" multiple>
                  </div>

                  <div class="col-md-2">
                     <button type="submit" class="btn">Upload</button>
                  </div>

               </form>

            </div>
               

         </section>
         
         <!-- Files Uploaded -->

         <section class="row">

            <div class="text-center">
               <p>Note: Refresh the page to clear upload files</p>
            </div>

            <div class="container-fluid box col-md-6 col-md-offset-3">
               <h3 class="text-center" style="color: #FFFFFF;">Files Uploaded</h3>

               <div name="files-container">

                  <!-- Show files uploaded here -->
                  <iframe id="showUploads" name="showUploads"></iframe>

                  <!-- <div>
                     <div class="alert sm-box text-center"><a href="#" class="close txt-black" data-dismiss="alert">&times;</a>File.pdf</div>
                  </div> -->

               </div>

            </div>

            <iframe name="hidden_iframe" style="display:none;"></iframe>
         </section>

         <!-- Customization -->

         <section class="row">
            <div class="text-center">
               <h2>Exam Customization</h2>
               <p>Edit difficulty and question type to be generated.</p>
            </div>
            
            <br/>

            <form class="form-horizontal" action="generating.php" method="POST">

               <div class="form-group">
                  <label class="control-label col-md-2 col-md-offset-1">Title</label>
                  <div class="col-md-7">
                     <input type="text" class="form-control" name="title">
                  </div>
               </div>

               <h4 class="text-center">Difficulty</h4>
               <p class="text-center">Easy | Average | Difficult</p>


               <!-- Slider Try -->
               <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">   
                     <div class="double_range_slider_box">
                        <div class="double_range_slider">
                           <span class="range_track" id="range_track"></span>
                     
                           <input name="easy" type="range" class="min slider" min="0" max="100" value="33" step="0" />
                           <input name="average" type="range" class="max slider" min="0" max="100" value="66" step="0" />
                     
                           <div class="minvalue"></div>
                           <div class="maxvalue"></div>
                        </div>
                     </div>
                  </div>
               </div>   

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Question Type</label>
                  <div class="col-md-7">
                     <div class="radio">
                        <label><input type="radio" name="type" value="mcq">Multiple Choice&nbsp;&nbsp;</label>
                        <label><input type="radio" name="type" value="owa">Short Answer&nbsp;&nbsp;</label>
                        <label><input type="radio" name="type" value="tof">True or False</label>
                     </div>
                  </div>
               </div>

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Number of Items</label>
                  <div class="col-md-7">
                     <input type="number" name="items" class="form-control" placeholder="1-10" min="1" max="10">
                  </div>
               </div>

               <div class="form-group">
                  <div class="col-md-2 col-md-offset-5">
                     <button class="btn-block" type="submit" name="submit">Generate</button>
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
   <script src="js/slider.js"></script>
</html>