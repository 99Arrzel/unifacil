
// START: jsPDF
function downloadPDFWithjsPDF() {
  var doc = new jspdf.jsPDF('p', 'pt', 'a4');

  doc.html(document.querySelector('#styledTable'), {
    callback: function (doc) {
      doc.save('MLB World Series Winners.pdf');
    }
  });
}

document.querySelector('#jsPDF').addEventListener('click', downloadPDFWithjsPDF);
// END: jsPDF


// START: browser print (native functionality, right-click >> Print (or Command + P))
function downloadPDFWithBrowserPrint() {
  window.print();
}
document.querySelector('#browserPrint').addEventListener('click', downloadPDFWithBrowserPrint);
// END: browser print
