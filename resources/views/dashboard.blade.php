@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="content_dash">
                    <h5>โครงงานทั้งหมด</h5>
                    <h3>11</h3>
                </div>
            </div>
            <div class="col-4">
                <div class="content_dash">
                    <h5>ผู้ใช้ทั้งหมด</h5>
                    <h3>7</h3>
                </div>
            </div>
           
                <div class="col-4">
                    <div class="content_dash">
                        <h5>หมวดหมู่โครงงานทั้งหมด</h5>
                        <h3>6</h3>
                    </div>
                </div>
            
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="content_dash">
                    <a href="{{ route('pendingProject') }}">
                    <h5>โครงงานรออนุมัติ</h5>
                    <h3>3</h3>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="content_dash">
                    <a href="{{ route('pendingUser') }}">
                    <h5>ผู้ใช้รออนุมัติ</h5>
                    <h3>2</h3>
                    </a>
                </div>
            </div>

        </div>
    </div>
    

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="content_dash">
                    <h5>โครงงานทั้งหมด</h5>
                    <h3>11</h3>
                </div>
            </div>
            <div class="col-4">
                <div class="content_dash">
                    <a href="{{ route('pendingProject') }}">
                        <h5>โครงงานรออนุมัติ</h5>
                        <h3>3</h3>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
