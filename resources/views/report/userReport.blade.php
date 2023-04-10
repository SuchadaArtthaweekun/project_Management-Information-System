@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                <button onclick="printData('reportView')"><i class="fa-solid fa-print"></i></button>

                <div id="reportView" >
                    <div >
                        <h4 style="text-align: center;"> สาขาวิชาเทคโนโลยีสารสนเทศ <br>
                            คณะวิทยาศาสตรื มหาวิทยาลัยราชภัฏบุรีรัมย์</h4>
                        <p style="text-align: center;">
                            รายงานสมาชิก
                        </p>
                    </div>
                   
                    <p class="txtreport" style="">
                        ผู้ใช้ทั้งหมด :{{ $coutAllUser }}
                        แอดมิน :{{ $coutAdmin }}
                        อาจารย์ :{{ $coutTch }}
                        นักศึกษา :{{ $coutStd }} <br>
                        อาจารย์ที่ยังไม่ได้รับอนุมัติ :{{ $coutUnTch }}
                        นักศึกษาที่ยังไม่ได้รับอนุมัติ :{{ $coutUnStd }}
                        รวมทั้งหมด :{{ $users->count() }}
                    </p>
                    <div style="display: flex;text-align: right;margin-bottom: 0px;">
                        <p style="margin-right: 10px;margin-bottom: 0px;">ข้อมูล ณ วันที่ </p>
                        <p id="datetime" style="margin-bottom: 0px;"></p>
                    </div>
                    <table class="table table-striped table-hover table-condensed"
                        style="">
                        <thead>
                            <tr style="text-align: left">
                                <th style="text-align: left">ลำดับ</th>
                                <th style="text-align: left"><strong>ชื่อ</strong></th>
                                <th style="text-align: left"><strong>อีเมล</strong></th>
                                <th style="text-align: left"><strong>ระดับผู้ใช้</strong></th>
                                <th style="text-align: left"><strong>รหัสประจำตัว</strong></th>
                                <th style="text-align: left"><strong>สถานะ</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr style="text-align: left">
                                    <th style="text-align: leftl; ">{{ ++$key }}
                                    </th>
                                    <th style="text-align: leftl;">{{ $user->name }} <br> {{ $user->name_en }}</th>
                                    <th style="text-align: left">{{ $user->email }}</th>
                                    <th style="text-align: left">{{ $user->level }}</th>
                                    <th style="text-align: left">{{ $user->username }}</th>
                                    <th style="text-align: left">
                                        <?php
                                        if ($user->status == 1) {
                                            echo 'เปิดใช้งาน';
                                        } else {
                                            echo 'ปิดใช้งาน';
                                        }
                                        ?>

                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script>
        var today = new Date();
        var datetime = today.toLocaleString();
        document.getElementById("datetime").innerHTML = datetime;

        function printData() {
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
