$(document).ready(function () {
    $(".printBtn").click(function () {
        printDiv('invoice_print');
    });
});

// function printDiv(divName) {
//     var printContents = document.getElementById(divName).innerHTML;
//     var originalContents = document.body.innerHTML;

//     // Create a new window to preserve original document and styles
//     var printWindow = window.open('', '_blank', 'height=600,width=800');
//     printWindow.document.write('<html><head><title>Print</title>');
//     // Include the CSS files or inline styles that are required for printing
//     var cssLinks = document.querySelectorAll('link[rel="stylesheet"], style');
//     cssLinks.forEach(function (link) {
//         printWindow.document.write(link.outerHTML);
//     });
//     printWindow.document.write('</head><body>');
//     printWindow.document.write(printContents);
//     printWindow.document.write('</body></html>');
//     printWindow.document.close(); // necessary for IE >= 10
//     printWindow.focus(); // necessary for IE >= 10

//     // Wait for the new window to load and then print
//     printWindow.onload = function () {
//         printWindow.print();
//         printWindow.close();
//     };

//     // Restore the original contents
//     setTimeout(function () {
//         window.location.reload();
//     }, 10000);
// }
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    //printContents.print();
     window.print();

    document.body.innerHTML = originalContents;
    setTimeout(function () {
        window.location.reload()
    }, 10000);
}

$(".downloadBtn").click(function () {
    const element = document.getElementById("invoice_print");
    let opt = {
        margin: 0,
        filename: 'invoice.pdf',
        image: {type: 'jpeg', quality: 1},
        jsPDF: {unit: 'in', format: 'a4', orientation: 'portrait'}
    };
    html2pdf().set(opt).from(element).save();
});

$(".downloadTimeTable").click(function () {
    const pdfContainer = document.createElement('div');
    var clonedElement = document.getElementById("timetable_print").cloneNode(true);
    pdfContainer.appendChild(clonedElement);
    pdfContainer.querySelectorAll('.tt_moredata').forEach(el => {
        el.classList.remove('d-none');
    });
    let title = $(this).attr('data-title')
        .toLowerCase()               // Convert to lowercase
        .replace(/\s+/g, '-')        // Replace spaces with hyphens
        .replace(/[^\w\-]+/g, '')    // Remove all non-word characters
        .replace(/\-\-+/g, '-')      // Replace multiple hyphens with a single hyphen
        .replace(/^-+/, '')          // Trim hyphens from the start
        .replace(/-+$/, '');         // Trim hyphens from the end
    // const element = document.getElementById("invoice_print");
    pdfContainer.style.width = '100%'; // Set to a percentage of the container width
    pdfContainer.style.margin = 'auto'; // Center the content within the PDF

    let opt = {
        margin: 1,
        filename: title+'.pdf',
        image: {type: 'jpeg', quality: 1},
        jsPDF: {unit: 'in', format: 'letter', orientation: 'landscape'},
        html2canvas: {
            scale: 1, // Keep scale consistent
            windowWidth: document.documentElement.scrollWidth, // Ensures full content width is captured
            scrollX: 0 // Avoid shifting horizontally
        },
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
    };
    html2pdf().set(opt).from(pdfContainer).save().then(() => {
            pdfContainer.remove();
    });
});
