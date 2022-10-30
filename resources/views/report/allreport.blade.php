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
                            <h5>รายงานโครงงานนักศึกษา</h5>
                        </a>
                    </div>
                    <div class="col-2">
                        <h3>print</h3>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="report_dash">
                    <a href="{{ route('userReport') }}">
                        <div class="col-10">
                            <h5>รายงานผู้ใช้</h5>
                        </div>
                        <div class="col-1">
                            <h3>print</h3>
                        </div>
                    </a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <a href="{{ route('projectCateReport') }}">
                            <h5>รายงานหมวดหมู่โครงงาน</h5>
                        </a>
                    </div>
                    <div class="col-1">
                        <h3>print</h3>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <h5>รายงานยอดกาวน์โหลด</h5>
                    </div>
                    <div class="col-1">
                        <h3>print</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <h5>รายงานยอดเข้าชม</h5>
                    </div>
                    <div class="col-1">
                        <h3>print</h3>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="report_dash">
                    <div class="col-10">
                        <h5>รายงานยอดกาวน์โหลด</h5>
                    </div>
                    <div class="col-1">
                        <h3>print</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
