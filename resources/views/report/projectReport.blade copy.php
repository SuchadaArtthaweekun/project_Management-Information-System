@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                <h3>Project Report</h3>
                <div class="titileReport">
                    <h5>รายงานโครงงานนนักศึกษาจำแนกตามหมวดหมู่โครงงาน</h5>
                    <button onclick="window.print()">Print</button>
                </div>
                {{-- show user --}}
                <select name="" id="" onchange="edition(this)" class="report">เลือกปีที่พิมพ์
                    <option value="2555">2555</option>
                    <option value="2556">2556</option>
                    <option value="2557">2557</option>
                    <option value="2558">2558</option>
                    <option value="2559">2559</option>
                    <option value="2560">2560</option>
                    <option value="2561">2561</option>
                    <option value="2562">2562</option>
                    <option value="2563">2563</option>
                    <option value="2564">2564</option>
                </select>
                <div class="viewCountReport">
                    <p>จำนวน :</p>
                    <p id="countEdition"></p>
                </div>

                <table class="table table-striped table-hover table-condensed" name="edition" id="edition">
                    <thead>
                        <tr>
                            <th><strong>No</strong></th>
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

                <div class="titileReport">
                    <h5>รายงานโครงงานนนักศึกษาจำแนกตามหมวดหมู่โครงงาน</h5>
                    <select name="" id="" onchange="gen(this)" class="report">เลือกโครงงานนักศึกษาตามรุ่น
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                    </select>
                    <div class="viewCountReport">
                        <p>จำนวน :</p>
                        <p id="countGen"></p>
                    </div>
                </div>
                


                <table class="table table-striped table-hover table-condensed" name="gen" id="gen">
                    <thead>
                        <tr>
                            <th><strong>id</strong></th>
                            <th><strong>ชื่อโครงงาน</strong></th>
                            <th><strong>ของรุ่น</strong></th>
                            <th><strong>หมวดหมู่</strong></th>
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
