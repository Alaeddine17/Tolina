
 function generatePDF(){

    var content = document.getElementById("content");
    
    html2canvas(content).then(function(canvas) {
    var imgData = canvas.toDataURL('image/png');
    var pdf = new jsPDF();
    pdf.addImage(imgData, 'PNG', 60, 10);
    pdf.save("File.pdf");
    window.location = "../src/categorie.php";

    });

}

generatePDF();