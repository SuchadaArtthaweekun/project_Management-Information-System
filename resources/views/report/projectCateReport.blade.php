@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                <h3>PC Report</h3>
                {{-- show user --}}
                <select name="" id="" onchange="filter(this)">เลือกหมวดหมู่
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->cate_id }}">{{ $cate->catename }}</option>
                    @endforeach
                </select>
                <table class="table table-striped table-hover table-condensed" name="project" id="project">
                    <thead>
                        <tr>
                            <th><strong>No</strong></th>
                            <th><strong>ชื่อโครงงาน</strong></th>
                            <th><strong>หมวดหมู่</strong></th>
                            <th><strong>อีเมล</strong></th>
                            <th><strong>ระดับผู้ใช้</strong></th>
                            <th><strong>รหัสนักศึกษาหรือรหัสอาจารย์</strong></th>
                            <th><strong>สถานะ</strong></th>
                            <th><strong>เบอร์โทร</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project as $pro)
                            <tr>
                                <td>{{ $pro->project_id }}</td>
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
    </body>
    <script>
        function filter(event) {
            var select, filter, table, tr,td, txtValue,i,count
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
    </script>
@endsection
