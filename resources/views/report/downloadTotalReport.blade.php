@extends('layouts.fordashboard')

@section('content')
    
    <div id="chart_div"></div>
    <div class="table-responsive">
        <div>
            <h3>รายงานสรุปยอดดาวน์โหลด</h3>
            <button name="exportPdf" id="exportPdf" onclick="exportPdf()"><i class="fa-sharp fa-solid fa-print"></i></button>

            {{-- <p class="txtreport">
                {{$projects}}
            </p>
            <div>
                {{$totalD}}
            </div> --}}

            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>#</strong></th>
                        <th><strong>ชื่อ</strong></th>
                        <th><strong>ยอดดาวน์โหลด</strong></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($totalD as $totald)
                        <tr>
                            <th></th>
                            <th>{{ $totald->title_th }} </th>
                            <th>{{ $totald->download }}</th>

                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    @endsection
