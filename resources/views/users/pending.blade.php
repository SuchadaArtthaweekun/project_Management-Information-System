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
                                <th>{{ $usr->username }}</th>
                                <th>
                                    <a href="/approveUser/{{$usr->id}}">
                                        <button class="btn btn-success">
                                            อนุมัติ
                                        </button>
                                    </a>
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
