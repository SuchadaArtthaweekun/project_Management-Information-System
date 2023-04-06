@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>

                <h3>รายงานโครงงานนนักศึกษาจำแนกตามรุ่น</h3>

                <button onclick="printData('reportView')">พิมพ์</button>
                <div id="reportView" style="">
                    <div>
                        <h4 style="text-align: center"> สาขาวิชาเทคโนโลยีสารสนเทศ <br>
                            คณะวิทยาศาสตรื มหาวิทยาลัยราชภัฏบุรีรัมย์</h4>
                        <p style="text-align: center">
                            รายงานโครงงานนนักศึกษาจำแนกตามรุ่น
                        </p>
                    </div>
                    <div class="titileReport">
                        <div style="display: flex">
                            <p>เลือกโครงงานนักศึกษาตามรุ่น</p>
                            <select name="" id="" onchange="gen(this)"
                                class="report">เลือกโครงงานนักศึกษาตามรุ่น
                                <option value="">ทั้งหมด</option>
                                @foreach ($selectGen as $key => $pro)
                                    <option value="{{ $pro->gen }}">{{ $pro->gen }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="viewCountReport">
                            <p>จำนวน :</p>
                            <p id="countGen"></p>
                        </div> --}}
                    </div>



                    <table class="table table-striped table-hover table-condensed" name="gen" id="gen">
                        <thead>
                            <tr>
                                <th style="text-align: left"><strong>อันดับ</strong></th>
                                <th style="text-align: left"><strong>ชื่อโครงงาน</strong></th>
                                <th style="text-align: left"><strong>ของรุ่น</strong></th>
                                <th style="text-align: left"><strong>หมวดหมู่</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $key => $pro)
                                <tr name="tr">
                                    <td name="td">{{ ++$key }}</td>
                                    <td name="td">{{ $pro->title_th }}</td>
                                    <td name="td">{{ $pro->gen }}</td>
                                    <td name="td">{{ $pro->catename }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
    </body>
    <script>
        function gen(event) {
            var select, filter, table, tr, td, txtValue, i, count, c, b, div, p, h4, h5
            select = event.options[event.selectedIndex].text
            // console.log (select) 

            filter = select.toUpperCase();
            // console.log(filter)
            count = document.getElementById('countGen');
            c = 0;
            table = document.getElementById("gen");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("tr")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue === filter) {
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
    </script>

    
    <script>
        function printData() {
            var div, p, h4, h5;
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
