@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                <h3>รายชื่อผู้ใช้</h3>
                <button onclick="printData('reportView')"><i class="fa-solid fa-print"></i></button>

                <div id="reportView" style="font-family: 'Kanit', sans-serif;">
                    <div style="font-family: 'Kanit', sans-serif;">
                        <h4 style="text-align: center;font-family: 'Kanit', sans-serif;"> สาขาวิชาเทคโนโลยีสารสนเทศ <br>
                            คณะวิทยาศาสตรื มหาวิทยาลัยราชภัฏบุรีรัมย์</h4>
                        <p style="text-align: center; font-family: 'Kanit', sans-serif;">
                            รายงานสมาชิก
                        </p>
                    </div>
                    <p class="txtreport" style=" font-family: 'Kanit', sans-serif;">
                        ผู้ใช้ทั้งหมด :{{ $coutAllUser }}
                        แอดมิน :{{ $coutAdmin }}
                        อาจารย์ :{{ $coutTch }}
                        นักศึกษา :{{ $coutStd }} <br>
                        อาจารย์ที่ยังไม่ได้รับอนุมัติ :{{ $coutUnTch }}
                        นักศึกษาที่ยังไม่ได้รับอนุมัติ :{{ $coutUnStd }}
                        รวมทั้งหมด :{{ $users->count() }}
                    </p>

                    <table class="table table-striped table-hover table-condensed"
                    style=" font-family: 'Kanit', sans-serif;">
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
                                    <th style="text-align: leftl; font-family: 'Kanit', sans-serif;">{{ ++$key }}</th>
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
