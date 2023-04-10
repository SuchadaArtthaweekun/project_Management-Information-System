@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div class="titledashboard">
            <h3>รายงาน</h3>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <a href="{{ route('projectReport') }}">
                            <h5>รายงานโครงงานนักศึกษารายปี</h5>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <a href="{{ route('userReport') }}">
                            <h5>รายงานสมาชิก</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <a href="{{ route('projectCateReport') }}">
                            <h5>รายงานโครงงานนักศึกษาตามหมวดหมู่โครงงาน</h5>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <a href="{{ route('reportDownloadTotal') }}">
                        <h5>รายงานยอดดาวน์โหลด</h5>
                    </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <a href="{{ route('reportViewTotal') }}">
                        <h5>รายงานยอดเข้าชม</h5>
                    </a>
                    </div>

                </div>
            </div> --}}
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <a href="{{ route('genReport2') }}">
                        <h5>รายงานสรุปยอดโครงานนักศึกษาตามรุ่น</h5>
                    </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
