@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
               <h3>User Report</h3>
            {{-- show user --}}
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>No</strong></th>
                        <th><strong>ชื่อ</strong></th>
                        <th><strong>ชื่อ (อังกฤษ)</strong></th>
                        <th><strong>อีเมล</strong></th>
                        <th><strong>ระดับผู้ใช้</strong></th>
                        <th><strong>รหัสนักศึกษาหรือรหัสอาจารย์</strong></th>
                        <th><strong>สถานะ</strong></th>
                        <th><strong>เบอร์โทร</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->name_en }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->level }}</th>
                            <th>{{ $user->note }}</th>
                            <th>{{ $user->status }}</th>
                            <th>{{ $user->user_tel }}</th>
                            <th>


                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </body>
@endsection