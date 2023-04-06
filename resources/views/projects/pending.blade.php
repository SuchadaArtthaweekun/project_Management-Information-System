@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div class="titledashboard">
            <h3>โครงงานนักศึกษารอการอนุมัติ</h3>
        </div>

        <div>
            {{-- <table class="table">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>ชื่อโครงงาน</th>
                        <th>ปีที่พิมพ์</th>
                        <th>ผู้จัดทำ</th>
                        <th>ที่ปรึกษา</th>
                        <th>หมวดหมู่โครงงาน</th>
                        <th>เพิ่มเติม</th>
                    </tr>
                </thead>
                <tbody>

                    @if (is_array($data) || is_object($data))
                        @foreach ($data as $key => $pro)
                            <tr>

                                <th>{{ ++$key }}</th>
                                <th>{{ $pro->title_th }}</th>
                                <th>{{ $pro->edition }}</th>
                                <th>{{ $pro->author }} {{ $pro->co_author }}</th>
                                <th>{{ $pro->adviser_fullname_th }}</th>
                                <th>{{ $pro->catename }}</th>
                                <th>
                                    <a href="/publishProject/{{ $pro->project_id }}">
                                        <button class="btn btn-success">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </a>

                                    <button class="btn btn-danger" onclick="del({{ $pro->project_id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <a href="/allfiles/{{ $pro->project_id }}">
                                        <button type="button" class="btn btn-warning">
                                            <i class="fa-solid fa-file"></i></button>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table> --}}

            {{-- new colume --}}

            <table class="table">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ข้อมูล</th>
                        <th>อนุมัติ ลบ ดู</th>
                    </tr>
                </thead>
                @if (is_array($data) || is_object($data))
                    @foreach ($data as $key => $dt)
                        <tbody>
                            <tr>
                                <th>{{ ++$key }}</th>
                                <th>
                                    <div class="dt">
                                        <p>ชื่อโครงงาน: {{ $dt->title_th }} <br>
                                            ผู้จัดทำ: {{ $dt->author }} {{ $dt->co_author }} <br>
                                            ปีที่พิมพ์: {{ $dt->edition }} หมวดหมู่โครงงาน: {{ $dt->catename }} <br>
                                            ที่ปรึกษา:

                                            @foreach ($adviser as $adv)
                                                @if ($dt->adviser == $adv->adviser_id)
                                                    {{ $adv->name_prefix_th }} {{ $adv->adviser_fullname_th }}
                                                @endif
                                            @endforeach
                                            <br>
                                            ที่ปรึกษาร่วม:
                                            @foreach ($adviser as $adv)
                                                @if ($dt->co_adviser == $adv->adviser_id)
                                                    {{ $adv->name_prefix_th }} {{ $adv->adviser_fullname_th }}
                                                @endif
                                            @endforeach
                                        </p>
                                        <br>
                                    </div>
                                </th>
                                <th>
                                    <a href="/publishProject/{{ $dt->project_id }}">
                                        <button class="btn btn-success">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </a>

                                    <button class="btn btn-danger" onclick="del({{ $dt->project_id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <a href="/allfiles/{{ $dt->project_id }}">
                                        <button type="button" class="btn btn-warning">
                                            <i class="fa-solid fa-file"></i></button>
                                    </a>
                                </th>
                            </tr>
                        </tbody>
                    @endforeach
                @endif
            </table>


        </div>
    </div>
    <script>
        const del = (id) => {
            Swal.fire({
                title: 'ต้องการลบไฟล์ ' + name,
                text: "คุณจะไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/deleteUser/${id}`).then((respons) => {
                        console.log(respons)
                    })
                    Swal.fire(
                        'ลบสำเร็จ',
                        'ไฟล์นี้ถูกลบแล้ว',
                        'success'
                    ).then(() => {
                        location.reload();
                    })
                }
            })
        }
    </script>
@endsection
