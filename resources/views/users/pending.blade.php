@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div class="titledashboard">
            <h3>ผู้ใช้รอการอนุมัติ</h3>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>อันดับ</th>
                        {{-- <th>รหัส</th> --}}
                        <th>ชื่อ</th>
                        <th>ชื่อ (อังกฤษ)</th>
                        <th>อีเมล</th>
                        <th>ระดับผู้ใช้</th>
                        <th>สถานะ</th>
                        <th>รหัสประจำตัว</th>
                        <th>เพิ่มเติม</th>
                    </tr>
                </thead>
                <tbody>
                   
                        @if (is_array($data) || is_object($data))
                            @foreach ($data as $key=> $usr)
                             <tr>
                                <th>{{ ++$key }}</th>
                                {{-- <th>{{ $usr->id }}</th> --}}
                                <th>{{ $usr->name }}</th>
                                <th>{{ $usr->name_en }}</th>
                                <th>{{ $usr->email }} </th>
                                <th>{{ $usr->level }}</th>
                                <th><?php if ($usr->status == '0') {
                                    echo 'off';
                                } elseif ($usr->status == '1') {
                                    echo 'on';
                                } ?></th>
                                <th>{{ $usr->username }}</th>
                                <th>
                                    
                                    <button class="btn btn-success" onclick="conf({{ $usr->id }})">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                    <button class="btn btn-danger" onclick="del({{ $usr->id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </th>
                            @endforeach
                        </tr>
                        @endif
                    
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const del = (id) => {
            Swal.fire({
                title: 'ต้องการลบผู้ใช้นี้',
                text: "คุณจะไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ลบผู้ใช้นี้',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/deleteUser/${id}`).then((respons) => {
                        console.log(respons)
                    })
                    Swal.fire(
                        'ลบสำเร็จ',
                        'ผู้ใช้นี้ถูกลบแล้ว',
                        'success'
                    ).then(() => {
                        location.reload();
                    })
                }
            })
        }
        // 

        const conf = (id) => {
            Swal.fire({
                title: 'อนุมัติผู้ใช้หรือไม่',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/approveUser/${id}`).then((respons) => {
                        console.log(respons)
                    })
                    Swal.fire(
                        'เพิ่มผู้ใช้แล้ว!'
                    ).then(() => {
                        location.reload();
                    })
                }
            })
        }
    </script>
@endsection
