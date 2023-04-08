@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                <div class="titileReport">
                </div>
                {{-- <button onclick="printData('reportView')"><i class="fa-solid fa-print"></i></button> --}}
                <button onclick="printData('reportView')">พิมพ์</button>
                {{-- show user --}}

                <div id="reportView">
                    <div>
                        <h4 style="text-align: center"> สาขาวิชาเทคโนโลยีสารสนเทศ <br>
                            คณะวิทยาศาสตรื มหาวิทยาลัยราชภัฏบุรีรัมย์</h4>
                        <p style="text-align: center">
                            รายงานโครงงานนักศึกษาจากปีที่พิมพ์
                        </p>
                    </div>
                    <p class="txtreport">

                    </p>
                    {{-- show user --}}
                    <div style="display: flex">
                        <p>โครงงานนักศึกษาจากปีที่พิมพ์</p>
                        <select name="" id="" onchange="edition(this)" class="report"
                            style="border: none;">เลือกปีที่พิมพ์
                            @foreach ($projectselect as $pro)
                                <option value="{{ $pro->edition }}">{{ $pro->edition }}</option>
                            @endforeach
                        </select>

                        <p>จำนวนโครงงานนักศึกษา :</p>
                        <p id="countEdition"></p>
                    </div>
                    <div style="display: flex;text-align: right;margin-bottom: 0px;">
                        <p style="margin-right: 10px;margin-bottom: 0px;">ข้อมูล ณ
                            วันที่ </p>
                        <p id="datetime" style="margin-bottom: 0px;"></p>
                    </div>
                    <div class="viewCountReport" style="display: flex">

                    </div>

                    <table class="table table-striped table-hover table-condensed" name="edition" id="edition"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: left"><strong>อันดับ</strong></th>
                                <th style="text-align: left"><strong>ชื่อโครงงาน</strong></th>
                                <th style="text-align: left"><strong>ปีที่พิมพ์</strong></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $key => $pro)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $pro->title_th }}</td>
                                    <td>{{ $pro->edition }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
    </body>
    <script>
        var today = new Date();
        var datetime = today.toLocaleString();
        document.getElementById("datetime").innerHTML = datetime;

        function edition(event) {
            var select, filter, table, tr, td, txtValue, i, count, c, div, p, h4
            select = event.options[event.selectedIndex].text
            // console.log (select) 

            filter = select.toUpperCase();
            // console.log(filter)
            count = document.getElementById('countEdition');
            c = 0;
            table = document.getElementById("edition");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        c = c + 1;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
                count.innerHTML = c;
            }
            console.log(table.tBodies[0].rows.length)

        }

        function printData() {
            var div, p, h4
            var divToPrint = document.getElementById("reportView");
            var divToPrint2 = document.getElementsByTagName("tr");
            var divToPrint3 = document.getElementsByTagName("td");
            // var tr = table.getElementsByTagName("tr");
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
        console.log(
            $('#reportView').css('color')
        )
        $('button').on('click', function() {
            printData();
        })
    </script>
@endsection
