@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                <h3>รายชื่อผู้ใช้</h3>
                <button onclick="window.print()"><i class="fa-sharp fa-solid fa-print"></i></button>

                <p class="txtreport">
                    ผู้ใช้ทั้งหมด :{{ $coutAllUser }}
                    แอดมิน :{{ $coutAdmin }}
                    อาจารย์ :{{ $coutTch }}
                    นักศึกษา :{{ $coutStd }} <br>
                    อาจารย์ที่ยังไม่ได้รับอนุมัติ :{{ $coutUnTch }}
                    นักศึกษาที่ยังไม่ได้รับอนุมัติ :{{ $coutUnStd }}
                    รวมทั้งหมด :{{ $users->count() }}
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
                            <th><strong>ลำดับ</strong></th>
                            <th><strong>ชื่อ</strong></th>
                            <th><strong>อีเมล</strong></th>
                            <th><strong>ระดับผู้ใช้</strong></th>
                            <th><strong>รหัสประจำตัว</strong></th>
                            <th><strong>สถานะ</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key =>$user)
                            <tr>
                                <th>{{  ++$key }}</th>
                                <th>{{ $user->name }} <br> {{ $user->name_en }}</th>
                                <th>{{ $user->email }}</th>
                                <th>{{ $user->level }}</th>
                                <th>{{ $user->username }}</th>
                                <th>{{ $user->status }}</th>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
    </body>
@endsection
