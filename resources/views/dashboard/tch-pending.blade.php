@extends('layouts.tch-dashboard')

@section('content')
    <div class="container">
        <div class="titledashboard">
            <h3>โครงงานนักศึกษารอการอนุมัติ</h3>
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
        
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อโครงงาน</th>
                        <th>ปีที่พิมพ์</th>
                        <th>ผู้จัดทำ</th>
                        <th>ที่ปรึกษา</th>
                        <th>หมวดหมู่</th>
                        <th>เผยแพร่/ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key=>$pro)
                     <tr>
                    {{-- @if (is_array($data) || is_object($data)) --}}
                        
                        <th>{{ ++$key }}</th>
                        <th>{{ $pro->title_th }}</th>
                        <th>{{ $pro->edition }}</th>
                        <th>{{ $pro->author }} <br> {{ $pro->co_author }}</th>
                        <th>{{ $pro->adviser_fullname_th }}</th>
                        <th>{{ $pro->catename }}</th>
                        <th>
                                <button class="btn btn-success" onclick="pending({{ $pro->project_id }})"> 
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            
                                <button class="btn btn-danger" onclick="del({{ $pro->project_id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <a href="/tchAllFiles/{{ $pro->project_id }}">
                                    <button type="button" class="btn btn-warning"> 
                                        <i class="fa-solid fa-file"></i>
                                    </button>
                                </a>
                            
                        </th>
                     
                    
                </tr>
                @endforeach
                {{-- @endif --}}
           
                </tbody>
                   
            </table>
        
    </div>
    <script>
        const del = (id) => {
            Swal.fire({
                title: 'ต้องการลบโครงงานนี้? ',
                text: "คุณจะไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/deletepro/${id}`).then((respons)=>{console.log(respons)})
                    Swal.fire(
                        'ลบสำเร็จ!',
                        'โครงงานนี้ถูกลบแล้ว'
                    ).then(()=>{location.reload();})
                }
            })
        }

        const pending = (id) => {
            Swal.fire({
                title: 'ต้องการเผยแพร่โครงงานนี้? ',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'เผยแพร่',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/tctPublish/${id}`).then((respons)=>{console.log(respons)})
                    Swal.fire(
                        'เผยแพร่สำเร็จ!',
                    ).then(()=>{location.reload();})
                }
            })
        }
    </script>
@endsection
