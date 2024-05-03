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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js" integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

         .navbar-brand a {
            color: #FFFFFF !important;

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


            <div class="text-center">
               <h1>Automated Exam Generator</h1>
               <p>Select PDF files to upload (max. 1MB)</p>

            <div class="text-center heading row">
               <h1 class="page-header">Automated Exam Generator</h1>
               
            </div>  

            <div class="row">

               <h4 class="text-center">Select PDF files to upload</h4>


               <br/>
               
               <div class="col-md-6 col-md-offset-3">
                  <input type="file" placeholder="Upload File" class="form-control selectpdf">
               </div>


               <br/><br/><br/>

               <form action="upload.php" method="POST" enctype="multipart/form-data" target="showUploads">

                  <div class="col-md-5 col-md-offset-3">
                     <input class="form-control" type="file" name="files[]" accept=".pdf" multiple>
                  </div>

                  <div class="col-md-2">
                     <button type="submit" class="btn">Upload</button>
                  </div>

               </form>


               <div class="col-md-2 col-md-offset-5">
                  <button type="button" class="btn-block upload">Upload</button>
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
               <p>Supply the details and select from the options below.</p>
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

                        <label><input type="radio" name="questionType" value="Multiple Choice">Multiple Choice</label>
                        <label><input type="radio" name="questionType" value="Descriptive">Descriptive</label>
                        <label><input type="radio" name="questionType" value="True or False">True or False</label>

                        <label><input type="radio" name="type" value="mcq">Multiple Choice&nbsp;&nbsp;</label>
                        <label><input type="radio" name="type" value="owa">Identification&nbsp;&nbsp;</label>
                        <!-- <label><input type="radio" name="type" value="tof">True or False</label> -->

                     </div>
                  </div>
               </div>

               <div class="form-group">
                  <label class=" control-label col-md-2 col-md-offset-1">Number of Items</label>
                  <div class="col-md-7">

                     <input type="number" class="form-control" placeholder="1-100" min="1" max="100">
                     <input type="number" name="items" class="form-control" placeholder="1-10" min="1" max="10">
                  </div>
               </div>

               <div class="form-group">
                  <div class="col-md-2 col-md-offset-5">
                     <button class="btn-block generate">Generate</button>
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

      <!-- Script for extracting and displaying text in a new window -->
      <script>
         // Set the worker source for PDF.js library
         pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js";
      
         // Get references to various elements
         let pdfinput = document.querySelector(".selectpdf"); // Reference to the PDF file input field
         let upload = document.querySelector(".upload"); // Reference to the upload button
         let generateBtn = document.querySelector(".generate"); // Reference to the generate button
         
         // Event listener for the upload button click
         upload.addEventListener('click', () => {
            let file = pdfinput.files[0]; // Get the selected PDF file
            if (file != undefined && file.type == "application/pdf") {
               let fr = new FileReader(); // Create a new FileReader object
               fr.readAsDataURL(file); // Read the file as data URL 
               fr.onload = () => {
                  let res = fr.result; // Get the result of file reading
                  extractText(res, true); // Extract text with password    
               }
            } else {
               alert("Select a valid PDF file");
            }
         });
      
         // Asynchronous function to extract text from the PDF
         async function extractText(url, pass) {
            try {
               let pdf;
               if (pass) {
                  pdf = await pdfjsLib.getDocument({ url: url }).promise; // Get the PDF document with password
               } else {
                  pdf = await pdfjsLib.getDocument(url).promise; // Get the PDF document without password
               }
               let pages = pdf.numPages; // Get the total number of pages in the PDF
               let alltext = ""; // Initialize variable to store all extracted text
               for (let i = 1; i <= pages; i++) {
                  let page = await pdf.getPage(i); // Get the page object for each page
                  let txt = await page.getTextContent(); // Get the text content of the page
                  let text = txt.items.map((s) => s.str).join(""); // Concatenate the text items into a single string
                  alltext += text + "\n"; // Add the extracted text to the variable
               }
               // Open a new window to display the extracted text
               let newWindow = window.open("", "Extracted Text", "width=600,height=400");
               newWindow.document.write("<pre>" + alltext + "</pre>"); // Write the extracted text to the new window
               // Generate quiz for the extracted text
               generateQuiz(alltext);
            } catch (err) {
               alert(err.message);
            }
         }

         // Function to generate quiz for the extracted text
         function generateQuiz(text) {
            // Call the function to generate quiz questions using the extracted text
            generateQuizAPI(text);
         }
      </script>

      <!-- Include the OpenAI API script -->
      <script src="api.js"></script>

   </body>
</html>
