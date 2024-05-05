<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Set the character encoding to UTF-8 -->
      <meta charset="UTF-8">
      <!-- Specify the compatibility mode for Internet Explorer -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Set the viewport to control the layout on mobile devices -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Set the title of the web page -->
      <title>Exam Gen</title>
      <script type="module" src="api.js"></script>
      <!-- Include the PDF.js library -->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js" integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
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
         
         button {
            border-radius: 10px;
            background: #000000;
            color: #FFFFFF;
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

         <section class="d-flex align-items-center justify-content-center row">

            <div class="text-center heading row">
               <h1 class="page-header">Automated Exam Generator</h1>
            </div>  

            <div class="row">

               <h4 class="text-center">Select PDF files to upload</h4>

               <br/>

               <form id="fileUploadForm" action="upload.php" method="POST" enctype="multipart/form-data" target="showUploads">

                  <div class="col-md-5 col-md-offset-3">
                     <input class="form-control" type="file" name="files[]" accept=".pdf" multiple>
                  </div>

                  <div class="col-md-2">
                     <button id="fileUploadButton" type="submit" class="btn">Upload</button>
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

               <div id="files-container">

                  <!-- Show files uploaded here -->
                  <iframe id="showUploads" name="showUploads"></iframe>

               </div>

            </div>

            <iframe name="hidden_iframe" style="display:none;"></iframe>
   
         </section>

         <!-- Customization -->

         <section class="row">
            <div class="text-center">
               <h2>Exam Customization</h2>
               <p>Supply the details and select from the options below.</p>
            </div>
            
            <br/>

            <form class="form-horizontal" action="generating.php" method="POST">

               <div class="form-group">
                  <label class="control-label col-md-2 col-md-offset-1">Title</label>
                  <div class="col-md-7">
                     <input type="text" class="form-control" name="title" placeholder="Set exam title here">
                  </div>
               </div>

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Difficulty</label>
                  <div class="col-md-7">
                     <div class="radio">
                        <label><input type="radio" name="difficulty" value="Easy">Easy&nbsp;&nbsp;</label>
                        <label><input type="radio" name="difficulty" value="Average">Average&nbsp;&nbsp;</label>
                        <label><input type="radio" name="difficulty" value="Difficult">Difficult</label>
                     </div>
                  </div>
               </div>

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Question Type</label>
                  <div class="col-md-7">
                     <div class="radio">

                        <label><input type="radio" name="type" value="mcq">Multiple Choice&nbsp;&nbsp;</label>
                        <label><input type="radio" name="type" value="owa">Identification&nbsp;&nbsp;</label>
                        <!-- <label><input type="radio" name="type" value="tof">True or False</label> -->

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
                     <button id="generateButton" class="btn btn-block generate" disabled >Generate</button>
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

   <script>
      const uploadButton = document.getElementById("fileUploadButton");
      const generateButton = document.getElementById("generateButton");

      function checkUploads() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "check_uploads.php", true);
            xhr.onreadystatechange = function() {
               if (xhr.readyState === XMLHttpRequest.DONE) {
                  if (xhr.status === 200) {
                     // Directory is not empty, enable the generateButton
                     generateButton.disabled = false;
                  } else {
                     // Directory is empty, disable the generateButton
                     generateButton.disabled = true;
                  }
               }
            };
            xhr.send();
        }

      document.getElementById("fileUploadForm").addEventListener("submit", function() {
            setTimeout(checkUploads, 1000); // Delay to allow time for file upload to complete
      });


   </script>
</html>
