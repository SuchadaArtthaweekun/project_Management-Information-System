@extends('layouts.fordashboard')

@section('content')
    
    <div id="chart_div"></div>
    <div class="table-responsive">
        <div>
            <h3>รายงานสรุปยอดเข้าชม</h3>
            {{-- <button name="exportPdf" id="exportPdf" onclick="exportPdf()"><i class="fa-sharp fa-solid fa-print"></i></button> --}}
            <button onclick="window.print()"><i class="fa-sharp fa-solid fa-print"></i></button>
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>ลำดับ</strong></th>
                        <th><strong>ชื่อ</strong></th>
                        <th><strong>ยอดดาวน์โหลด</strong></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($View as  $key =>$total)
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{ $total->title_th }} </th>
                            <th>{{ $total->view }}</th>
                            <th>{{ $totalV}}</th>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    @endsection
