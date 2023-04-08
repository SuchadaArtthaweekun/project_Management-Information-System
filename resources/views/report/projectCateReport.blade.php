@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                {{-- show user --}}
                <button onclick="printData('reportView')">พิมพ์</button>
                <div id="reportView">
                    <div>
                        <h4 style="text-align: center"> สาขาวิชาเทคโนโลยีสารสนเทศ <br>
                            คณะวิทยาศาสตรื มหาวิทยาลัยราชภัฏบุรีรัมย์</h4>
                        <p style="text-align: center">
                            รายงานโครงงานนักศึกษาจากหมวดหมู่โครงงานนักศึกษา
                        </p>
                    </div>
                    <div style="display: flex">
                        <p style="margin-right: 10px;margin-bottom: 0px;">โครงงานนักศึกษาจากหมวดหมู่โครงงานนักศึกษา</p>
                        <select name="" id="" onchange="filter(this)">เลือกหมวดหมู่
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->cate_id }}">{{ $cate->catename }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="display: flex;text-align: right;margin-bottom: 0px;">
                        <p style="margin-right: 10px;margin-bottom: 0px;">ข้อมูล ณ
                            วันที่ </p>
                        <p id="datetime" style="margin-bottom: 0px;"></p>
                    </div>

                    <table class="table table-striped table-hover table-condensed" name="project" id="project">
                        <thead>
                            <tr>
                                <th style="text-align: left"><strong>อันดับ</strong></th>
                                <th style="text-align: left"><strong>ชื่อโครงงาน</strong></th>
                                <th style="text-align: left"><strong>หมวดหมู่</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $key => $pro)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $pro->title_th }}</td>
                                    <td>{{ $pro->catename }}</td>
                                    {{-- <th>{{ $pro->email }}</th>
                            <th>{{ $pro->level }}</th>
                            <th>{{ $pro->note }}</th>
                            <th>{{ $pro->status }}</th>
                            <th>{{ $pro->user_tel }}</th> --}}
                                    <th>


                                    </th>
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


        function filter(event) {
            var select, filter, table, tr, td, txtValue, i, count, div, p, h4, h5
            select = event.options[event.selectedIndex].text
            // console.log (select) 

            filter = select.toUpperCase();
            // console.log(filter)

            table = document.getElementById("project");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";

                    } else {
                        tr[i].style.display = "none";
                    }
                }
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
