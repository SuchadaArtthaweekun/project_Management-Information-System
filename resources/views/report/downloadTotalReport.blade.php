@extends('layouts.fordashboard')

@section('content')
    <div id="chart_div"></div>
    <div class="table-responsive">
        <div>
           
            <button onclick="printData('reportView')">พิมพ์</button>
            <div id="reportView">
                <div>
                    <h4 style="text-align: center"> สาขาวิชาเทคโนโลยีสารสนเทศ <br>
                        คณะวิทยาศาสตรื มหาวิทยาลัยราชภัฏบุรีรัมย์</h4>
                    <p style="text-align: center">
                        รายงานสรุปยอดดาวน์โหลด
                    </p>
                </div>
                <div style="display: flex;text-align: right;margin-bottom: 0px;">
                    <p style="margin-right: 10px;margin-bottom: 0px;">ข้อมูล ณ
                        วันที่ </p>
                    <p id="datetime" style="margin-bottom: 0px;"></p>
                </div>
                <table class="table table-striped table-hover table-condensed" style="text-align: left;">
                    <thead>
                        <tr>
                            <th style="text-align: left"><strong>ลำดับ</strong></th>
                            <th style="text-align: left"><strong>ชื่อ</strong></th>
                            <th style="text-align: left"><strong>ยอดดาวน์โหลด</strong></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($totalD as $key => $totald)
                            <tr>
                                <th> {{ ++$key }}</th>
                                <th>{{ $totald->title_th }} </th>
                                <th>{{ $totald->download }}</th>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

        <script>
            var today = new Date();
            var datetime = today.toLocaleString();
            document.getElementById("datetime").innerHTML = datetime;

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
