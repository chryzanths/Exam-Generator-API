<!DOCTYPE html>
<html>
   <head>
      <title>Exam Gen</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js" integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

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

               <br/><br/><br/>

               <div class='col-md-2 col-md-offset-5'>
                  <button id="download" onclick="downloadFile('<?php echo $type; ?>', '<?php echo $title; ?>')">Download as PDF</button>
               </div>
               
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

// ito yung part na nabura, sorry sorry.. ito yung pang extract natin ng text sa JSON eh

<?php
$uploadedFiles = array();
foreach ($_SESSION['uploadedFiles'] as $file) {
    $uploadedFiles[] = $file['path'];
}
?>

let uploadedfiles = <?php echo json_encode($uploadedFiles); ?>;
console.log(uploadedfiles);
let type = "<?php echo $type; ?>";
console.log(type);
let title = "<?php echo $title; ?>";
console.log(title);
let alltext = ""; // Initialize variable to store all extracted text

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
            let txt = await page.getTextContent(); // Get the text content of the page
            let text = txt.items.map((s) => s.str).join(""); // Concatenate the text items into a single string
            alltext += text + "\n"; // Add the extracted text to the variable
        }
    } catch (err) {
        console.log("Error extracting text: ", err);
    }
}


async function downloadFile(type, title) { // function pang handle ng document na paglalagyan ng contents
    try {
        const { jsPDF } = window.jspdf;
        let content = await pdfContentHandler(type, title);
        var doc = new jsPDF();
        const margins = { 
            top: 10,
            bottom: 10,
            left: 10,
            width: 180
        };
        doc.setFontSize(10); 

        // codes naman to para yung title sa document is nasa gitna
        doc.setFontSize(16); 
        doc.text(title, doc.internal.pageSize.width / 2, margins.top, { align: 'center' });
        doc.setFontSize(10);
        // di ko alam kung bakit need mag set ng font size ng dalawang beses pero as long as gumagana

        addText(doc, content, margins); 
        doc.save(`${title}.pdf`);
    } catch (error) {
        console.error('Error:', error.message);
    }
}

// below is yung code na responsible kung bakit hindi na jpeg at manananggal yung text

function addText(doc, text, margins) {
    let lineHeight = doc.getLineHeight(); // kunin yung height nung kabuuang text/content
    let lines = doc.splitTextToSize(text, margins.width); // hatiin yung text pag di na kasya sa isang page
    let cursorY = margins.top + 20; // ewan ko dito, basta kukuhain na yung position ng cursor, mahalaga daw yan

    lines.forEach(line => { 
      // if mataas na daw ang height ng text/content to the point na it exceed page size and margin...
        if (cursorY + lineHeight > doc.internal.pageSize.height - margins.bottom) {
         // .. mag-aadd pa ng isa pang page
            doc.addPage();
            cursorY = margins.top; // cursor position
        }
        doc.text(margins.left, cursorY, line);
        cursorY += lineHeight; // ililipat yung cursor position on next line
    });
}

pdfContentHandler = async (type, title) => {
    switch (type) {
        case "mcq":
            return await mcqFormat(title);
        case "tof":
            return await tofFormat(title);
        case "owa":
            return await owaFormat(title);
    }
}

mcqFormat = async (title) => {
    const file = 'QandA/mcq/sample_mcq.json';
    let indexCounter = 1;
    let output = ``;

    try {
        let response = await fetch(file);
        let data = await response.json();

        data.qna.forEach(element => {
            let q = element.question;
            let a = element.A;
            let b = element.B;
            let c = element.C;
            let d = element.D;
            let answer = element.answer;
            output += `${indexCounter}. ${q}\n`;
            output += `A. ${a}\n`;
            output += `B. ${b}\n`;
            output += `C. ${c}\n`;
            output += `D. ${d}\n`;
            output += `Answer: ${answer}\n\n`;

            if (indexCounter % 4 == 0) {
                output += `\n`;
            }

            indexCounter++;
        });

    } catch (error) {
        console.error("error", error);
    }

    return output;
}

owaFormat = async (title) => {
    const file = 'QandA/des/sample_des.json';
    let indexCounter = 1;
    let output = ``;
    
    try {
        let response = await fetch(file);
        let data = await response.json();

        data.qna.forEach(element => {
            let q = element.question;
            let answer = element.answer;
            output += `${indexCounter}. ${q}\n`;
            output += `Answer: ${answer}\n\n`;
            indexCounter++;
        });

    } catch (error) {
        console.error("error", error);
    }

    return output;
}
</script>
</body>
</html>
