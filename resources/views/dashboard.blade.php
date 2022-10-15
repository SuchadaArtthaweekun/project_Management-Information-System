@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="content_dash">
                    <h5>โครงงานทั้งหมด</h5>
                    <h3>{{$countprojects}}</h3>
                </div>
            </div>
            <div class="col-4">
                <div class="content_dash">
                    <h5>ผู้ใช้ทั้งหมด</h5>
                    <h3>{{$coutAllUser}}</h3>
                </div>
            </div>
           
                <div class="col-4">
                    <div class="content_dash">
                        <h5>หมวดหมู่โครงงานทั้งหมด</h5>
                        <h3>{{$cate}}</h3>
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
                    <h3>{{$countUnprojects}}</h3>
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="content_dash">
                    <a href="{{ route('pendingUser') }}">
                    <h5>ผู้ใช้รออนุมัติ</h5>
                    <h3>{{$coutUnMember}}</h3>
                    </a>
                </div>
            </div>

        </div>
    </div>
    
@endsection
