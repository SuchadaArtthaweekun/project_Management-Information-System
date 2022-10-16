@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div>
            <h5>โครงงานนักศึกษารอการอนุมัติ</h5>
        </div>
        <div>
            @if (Session::get('info'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>ดำเนินการสมัครเสร็จสิ้นแล้ว รอการอนุมัติ</strong>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
        <div>
            <table class="table">
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
                        @foreach ($data as $pro)
                            <tr>

                                <th>{{ $pro->project_id }}</th>
                                <th>{{ $pro->title_th }}</th>
                                <th>{{ $pro->edition }}</th>
                                <th>{{ $pro->author }} {{ $pro->co_author }}</th>
                                <th>{{ $pro->adviser_fullname_th }}</th>
                                <th>{{ $pro->catename }}</th>
                                <th>
                                    <a href="/publishProject/{{ $pro->project_id }}">
                                        <button class="btn btn-success">
                                            เผยแพร่
                                        </button>
                                    </a>
                                    <a href="/allfiles/{{ $pro->project_id }}">
                                        <button type="button" class="btn btn-warning">
                                            <i class="fa-solid fa-file"></i></button>
                                    </a>
                                    <button class="btn btn-danger" onclick="del({{ $pro->project_id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </th>
                            </tr>
                        @endforeach
                    @endif

                </tbody>

            </table>
        </div>
    </div>
    <script>
        const del = (id) => {
            Swal.fire({
                title: 'Are you sure? ' + id,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/deleteUser/${id}`).then((respons) => {
                        console.log(respons)
                    })
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ).then(() => {
                        location.reload();
                    })
                }
            })
        }
    </script>
@endsection
