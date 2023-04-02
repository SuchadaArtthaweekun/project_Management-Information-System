var pdfMake = require('pdfmake/build/pdfmake.js');
var pdfFonts = require('pdfmake/build/vfs_fonts.js');

pdfMake.vfs = pdfFonts.pdfMake.vfs;
pdfMake.fonts = {
    THSarabunNew: {
        normal: "THSarabunNew.ttf",
        bold: "THSarabunNew Bold.ttf",
        italics: "THSarabunNew Italic.ttf",
        bolditalics: "THSarabunNew BoldItalic.ttf",
    },
    Roboto: {
        normal: "Roboto-Regular.ttf",
        bold: "Roboto-Medium.ttf",
        italics: "Roboto-Italic.ttf",
        bolditalics: "Roboto-MediumItalic.ttf",
    },
    Fontello: {
        normal: "fontello.ttf",
        bold: "fontello.ttf",
        italics: "fontello.ttf",
        bolditalics: "fontello.ttf",
    },
};

function examplealrt(){
    alert('mayang')
}

function exportPdf() {
    var docDefinition = {
        content: [
            {
                text: "สร้าง pdf ภาษาไทยด้วย pdfmake",
                fontSize: 15,
            },
        ],
        defaultStyle: {
            font: "THSarabunNew",
        },
    };
    pdfMake.creatPdf(docDefinition).open();
}