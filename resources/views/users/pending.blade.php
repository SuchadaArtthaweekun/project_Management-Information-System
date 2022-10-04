@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div>
            <h5>โครงงานนักศึกษารอการอนุมัติ</h5>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ชื่อ</th>
                        <th>ชื่อ (อังกฤษ)</th>
                        <th>อีเมล</th>
                        <th>ระดับผู้ใช้</th>
                        <th>สถานะ</th>
                        <th>รหัสนักศึกษา หรือ รหัสอาจารย์</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (is_array($data) || is_object($data))
                        
                        @foreach ($data as $usr)
                            <tr>
                                <th>{{ $usr->id }}</th>
                                <th>{{ $usr->name }}</th>
                                <th>{{ $usr->name_en }}</th>
                                <th>{{ $usr->email }} </th>
                                <th>{{ $usr->level }}</th>
                                <th>{{ $usr->status }}</th>
                                <th>{{ $usr->note }}</th>
                                <th>
                                    <a href="{{ route('approveUser') }}">
                                        <button class="btn btn-success">
                                            อนุมัติ
                                        </button>
                                    </a>
                                    <a href="/deleteUser/{{ $usr->id }}">
                                        <button class="btn btn-danger">
                                            ลบ
                                        </button>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
