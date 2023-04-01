@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                <h3>รายงานโครงงานนักศึกษา</h3>
                <div class="titileReport">
                    {{-- <h5>รายงานโครงงานนนักศึกษาจำแนกตามหมวดหมู่โครงงาน</h5> --}}
                   
                </div>
                {{-- show user --}}
                <p class="txtreport">
                    โครงงานนักศึกษาทั้งหมด :{{ $project->count() }}
                    
                </p>

                <button onclick="window.print()"><i class="fa-sharp fa-solid fa-print"></i></button>
            

                <table class="table table-striped table-hover table-condensed" name="edition" id="edition">
                    <thead>
                        <tr>
                            <th><strong>#</strong></th>
                            <th><strong>ชื่อโครงงาน</strong></th>
                            <th><strong>ปีที่พิมพ์</strong></th>
                            <th><strong>หมวดหมู่</strong></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project as $pro)
                            <tr>
                                <td>{{ $pro->project_id }}</td>
                                <td>{{ $pro->title_th }}</td>
                                <td>{{ $pro->edition }}</td>
                                <td>{{ $pro->catename }}</td>
                                <th>


                                </th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                


            </div>
    </body>
    <script>
        function edition(event) {
            var select, filter, table, tr, td, txtValue, i, count, c
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
    </script>
@endsection
