@extends('layouts.fordashboard')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="chart_div"></div>
    <div class="table-responsive">
        <div>
            <h3>รายงานสรุปยอดดาวน์โฆลด</h3>
            <button onclick="window.print()"><i class="fa-sharp fa-solid fa-print"></i></button>

            <p class="txtreport">
               
            </p>





            {{-- show user --}}
            {{-- <table class="table table-striped table-hover table-condensed">
            <h3>รายชื่อผู้ดูแลระบบ</h3>
            <thead>
                <tr>
                    <th><strong>No</strong></th>
                    <th><strong>ชื่อ</strong></th>
                    <th><strong>อีเมล</strong></th>
                    <th><strong>ระดับผู้ใช้</strong></th>
                    <th><strong>รหัสประจำตัว</strong></th>
                    <th><strong>สถานะ</strong></th>
                    <th><strong>เบอร์โทร</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userAdmin as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }} <br>  {{ $user->name_en }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ $user->level }}</th>
                        <th>{{ $user->username }}</th>
                        <th>{{ $user->status }}</th>
                        <th>{{ $user->user_tel }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}


            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>#</strong></th>
                        <th><strong>ชื่อ</strong></th>
                        <th><strong>ยอดดาวน์โหลด</strong></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($total as $totald)
                        <tr>
                            <th>{{ $totald->id }}</th>
                            <th>{{ $totald->title_th }} </th>
                            <th>{{ $totald->download_counter }}</th>
                            
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endsection
