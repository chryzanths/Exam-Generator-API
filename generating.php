<!DOCTYPE html>
<html>
   <head>
      <title>Exam Gen</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script type="module" src="api.js"></script>
      <!-- Integrate the downloadFile.js file -->
      <script src="downloadFile.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js" integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

      <style>

         body {
            padding-bottom: 100px;
            padding-top: 100px;
         }
         
         .navbar-brand a {
            color: #FFFFFF !important;
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
            $difficulty = $_POST['difficulty'];
            $type = $_POST['type'];
            $items = $_POST['items'];

            $customInfo = [
               'title' => $title,
               'difficulty' => $difficulty,
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
               <div class="navbar-brand"><a href="#" data-toggle="modal" data-target="#confirmationModal">NEUPaperTrail</a></div>
            </div>

            <ul class="nav navbar-nav navbar-right">
               <li><a href="#" data-toggle="modal" data-target="#confirmationModal">HOME</a></li>
            </ul>

         </div>
      </nav>

      <!-- Modal -->
      <div class="modal fade" id="confirmationModal">
         <div class="modal-dialog">
            <div class="modal-content">

               <div class="modal-header">
                  <button class="close" data-dismiss="modal">&times;</button>
                  <h5 class="modal-title">Confirmation</h5>
               </div>

               <div class="modal-body">
                  Are you sure you want to go back to the home page? <br/>
                  The data you submitted or exam progress will be deleted.
               </div>

               <div class="modal-footer">
                  <form action="index.php">
                     <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-danger">Go back to home page</button>
                  </form>   
               </div>

            </div>
         </div>
      </div>
      
      <!-- Title Part And Content-->
      <div class="container-fluid">  
         <section class="d-flex align-items-center justify-content-center">
            <div class="text-center">
               <h1><strong>Generating Exam...</strong></h1>
               <p>Please wait for a moment.</p>

               <!-- download button.. pangit yung kulay nung download button sorry di ko alam pano palitan -->
               <button onclick="downloadFile()" class="btn btn-primary">Download PDF</button>
               <!-- End of download button -->

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
                     case "owa":
                        $next_page = "quiz-owa.php";
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
               $difficulty = $customInfo['difficulty'];
               $type = $customInfo['type'];
               $items = $customInfo['items'];

               switch($type) {
                  case "mcq":
                     $q_type = "Multiple Choice";
                     break;
                  case "owa":
                     $q_type = "Identification";
                     break;
                  case "tof":
                     $q_type = "True or False";
                     break;
               }

               echo "<div class='text-center'>";
               echo "<h3><strong>Title: </strong></h3><h4>$title</h4>";
               echo "<h3><strong>Difficulty: </strong></h3><h4>$difficulty</h4>";
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
   <script>
      pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js";

      <?php
      $uploadedFiles = array();
      foreach ($_SESSION['uploadedFiles'] as $file) {
         $uploadedFiles[] = $file['path'];
      }
      ?>

      let uploadedfiles = <?php echo json_encode($uploadedFiles); ?>;
      console.log(uploadedfiles);
      let alltext=""; // Initialize variable to store all extracted text

      uploadedfiles.forEach(file => {
         extractText(file, false);
      });

      async function extractText(url, pass) {
         try {
            console.log("URL:", url); // Debugging statement
            let pdf;
            if (pass) {
               pdf = await pdfjsLib.getDocument({ url: url }).promise; // Get the PDF document with password
            } else {
               pdf = await pdfjsLib.getDocument(url).promise; // Get the PDF document without password
            }
            
            console.log(pdf);

            let pages = pdf.numPages; // Get the total number of pages in the PDF
            for (let i = 1; i <= pages; i++) {
               let page = await pdf.getPage(i); // Get the page object for each page
               console.log(page);
               let txt = await page.getTextContent(); // Get the text content of the page
               console.log(txt);
               let text = txt.items.map((s) => s.str).join(""); // Concatenate the text items into a single string
               console.log(text);
               alltext += text + "\n"; // Add the extracted text to the variable
               console.log(alltext);
            }
            // Open a new window to display the extracted text
            let newWindow = window.open("", "Extracted Text", "width=600,height=400");
            newWindow.document.write("<pre>" + alltext + "</pre>"); // Write the extracted text to the new window
            // Generate quiz for the extracted text
            //generateQuiz(alltext);
         } catch (err) {
            console.log("Error extracting text: ", err);
         }
      } 

      async function downloadFile() {
    try {
        const filename = "<?php echo $title; ?>.pdf"; // yung $title is yun yung magiging file name

        // setting attributes at format nung paper chuchu di ko alam to, basta sabi ni jason sa stackoverflow gumagana daw to
        const opt = {
            margin: 1,
            filename: filename,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: {
                unit: 'in', format: 'letter',
                orientation: 'portrait'
            }
        };

        // generating na tapos set attributes, kukuha yung blank na pdf ng content sa alltext tapos save 
        // (palitan nalang yung alltext ng variable wherein doon na nakastore yung generated quiz)
        await html2pdf().set(opt).from(alltext).save();
    } catch (error) { // error handling
        console.error('Error:', error.message);
    }
}

   </script>
   
</html>
