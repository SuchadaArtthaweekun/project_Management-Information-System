@extends('layouts.fordashboard')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.69/pdfmake.js"></script>
    {{-- <script type="text/javascript" src="<?php echo asset('js/vfs_font.js'); ?>"></script> --}}
   
    <div id="chart_div"></div>
    <div class="table-responsive">
        <div>
            <h3>รายงานสรุปยอดดาวน์โหลด</h3>
            <button name="exportPdf" id="exportPdf" onclick="exportPdf()"><i class="fa-sharp fa-solid fa-print"></i></button>

            <p class="txtreport">

            </p>

            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="text-align: left"><strong>#</strong></th>
                        <th style="text-align: left"><strong>ชื่อ</strong></th>
                        <th style="text-align: left"><strong>ยอดดาวน์โหลด</strong></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($total as $totald)
                        <tr>
                            <th style="text-align: left">{{ $totald->id }}</th>
                            <th style="text-align: left">{{ $totald->title_th }} </th>
                            <th style="text-align: left">{{ $totald->download_counter }}</th>

                        </tr>
                    @endforeach

                </tbody>
            </table>

            <script type="text/javascript">
            var pdfFonts = require('<?php echo asset('js/vfs_font.js'); ?>');
                pdfMake.vfs = pdfFonts.pdfMake.vfs;
                pdfMake.fonts = {
                    THSarabunNew: {
                        normal: "https://github.com/sathittham/pdfmake-customfont/blob/main/examples/fonts/THSarabunNew.ttf",
                        bold: "https://github.com/sathittham/pdfmake-customfont/blob/main/examples/fonts/THSarabunNew%20Bold.ttf",
                        italics: "https://github.com/sathittham/pdfmake-customfont/blob/main/examples/fonts/THSarabunNew%20Italic.ttf",
                        bolditalics: "https://github.com/sathittham/pdfmake-customfont/blob/main/examples/fonts/THSarabunNew%20BoldItalic.ttf",
                    },
                    Roboto: {
                        normal: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Regular.ttf',
                        bold: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Medium.ttf',
                        italics: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Italic.ttf',
                        bolditalics: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-MediumItalic.ttf'
                    },
                    Fontello: {
                        normal: "fontello.ttf",
                        bold: "fontello.ttf",
                        italics: "fontello.ttf",
                        bolditalics: "fontello.ttf",
                    },
                };

                function examplealrt() {
                    alert('mayang')
                }

                function exportPdf() {
                    var docDefinition = {
                        content: [{
                            text: "สร้าง pdf ภาษาไทยด้วย pdfmake",
                            fontSize: 15,
                        }, ],
                        defaultStyle: {
                            font: "THSarabunNew",
                        },
                    };
                    pdfMake.createPdf(docDefinition).open();
                }
            </script>

        </div>
    @endsection
