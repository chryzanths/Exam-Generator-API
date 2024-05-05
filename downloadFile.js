// something like api/library for downloadable pdf

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>


//async function downloadFile() {
//    try {
//        const doc = new jsPDF(); // gawa ng blank pdf
//        doc.text(alltext, 10, 10); // lalagay yung alltext sa loob ng blank na pdf (palitan mo nalang yung alltext ng variable wherein doon na nakastore yung generated quiz)
//        doc.save('<?php echo $title; ?>.pdf');  // save yung pdf document with the title of quiz as file name
//    } catch (err) { // error handling
//        console.log("Error creating PDF: ", err);
//    }
//}

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
