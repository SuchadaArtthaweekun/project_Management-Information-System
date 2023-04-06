@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>

                <h3>รายงานโครงงานนนักศึกษาจำแนกตามรุ่น</h3>

                <button onclick="printData('reportGen')"><i class="fa-solid fa-print"></i></button>
                <div class="reportGen" id="reportGen" style="">
                    <h5>รายงานโครงงานนนักศึกษาจำแนกตามรุ่น</h5>
                    <div class="titileReport">
                        <select name="" id="" onchange="gen(this)" class="report">เลือกโครงงานนักศึกษาตามรุ่น
                            <option value="">ทั้งหมด</option>
                            @foreach ($selectGen as $key => $pro)
                                <option value="{{ $pro->gen }}">{{ $pro->gen }}</option>
                            @endforeach
                        </select>
                        <div class="viewCountReport">
                            <p>จำนวน :</p>
                            <p id="countGen"></p>
                        </div>
                    </div>



                    <table class="table table-striped table-hover table-condensed" name="gen" id="gen">
                        <thead>
                            <tr>
                                <th style="text-align: left"><strong>id</strong></th>
                                <th style="text-align: left"><strong>ชื่อโครงงาน</strong></th>
                                <th style="text-align: left"><strong>ของรุ่น</strong></th>
                                <th style="text-align: left"><strong>หมวดหมู่</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $pro)
                                <tr>
                                    <td>{{ $pro->project_id }}</td>
                                    <td>{{ $pro->title_th }}</td>
                                    <td>{{ $pro->gen }}</td>
                                    <td>{{ $pro->catename }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
    </body>
    <script>
        function gen(event) {
            var select, filter, table, tr, td, txtValue, i, count, c
            select = event.options[event.selectedIndex].text
            // console.log (select) 

            filter = select.toUpperCase();
            // console.log(filter)
            count = document.getElementById('countGen');
            c = 0;
            table = document.getElementById("gen");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
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

        function printData() {
            var divToPrint = document.getElementById("reportGen");
            var divToPrint2 = document.getElementsByTagName("tr");
            var divToPrint3 = document.getElementsByTagName("td");
            // var tr = table.getElementsByTagName("tr");
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
        console.log(
            $('#reportGen').css('color')
        )
        $('button').on('click', function() {
            printData();
        })
    </script>
@endsection
