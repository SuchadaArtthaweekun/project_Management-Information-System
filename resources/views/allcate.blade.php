@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div class="titledashboard">
                <h3>หมวดหมู่โครงงานนักศึกษาทั้งหมด</h3>
            </div>
            <div class="btnadd">

                {{-- add category --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_adduser">
                    Add category
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modal_adduser" tabindex="-1" aria-labelledby="modal_adduser" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ route('createCate') }}">
                                <div class="modal-body">
                                    <div class="col-md-8">

                                        @csrf
                                        <div class="form-group">
                                            <label for="title">ชื่อหมวดหมู่โครงงาน</label>
                                            <input type="hidden" name="catename">
                                            <input type="text" name="catename" class="form-control"
                                                placeholder="ชื่อหมวดหมู่โครงงาน">
                                        </div>




                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" href="{{ route('alluser') }}">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>id</strong></th>
                        <th><strong>ชื่อ</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->cate_id }}</th>
                            <th>{{ $category->catename }}</th>
                            <th>
                                {{-- <a href="/editcate/{{ $category->cate_id }}">
                                    <button type="button" class="btn btn-success">แก้ไข</button>
                                </a> --}}



                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_{{ $category->cate_id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal_{{ $category->cate_id }}" tabindex="-1"
                                    aria-labelledby="modal_{{ $category->cate_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขหมวดหมู่โครงงาน</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="get" action="{{ route('updatecate') }}">
                                                <div class="modal-body">
                                                    <div class="col-md-6">

                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="title">ชื่อหมวดหมู่</label>
                                                            <input type="hidden" value="{{ $category->cate_id }}"
                                                                name="cate_id">
                                                            <input type="text" name="catename" class="form-control"
                                                                placeholder="Enter
                                                            post title"
                                                                value="{{ $category->catename }}">
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" href="allcate">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger" onclick="del({{ $category->cate_id }})"><i
                                        class="fa-solid fa-trash"></i></button>



                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </body>

    <script>
        const del = (id) => {
            Swal.fire({
                title: 'ต้องการลบหมวดหมู่โครงงาน ' + name,
                text: "คุณจะไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/deletecate/${id}`).then((respons) => {
                        console.log(respons)
                    })
                    Swal.fire(
                        'ลบสำเร็จ',
                        'หมวดหมู่โครงงานนี้ถูกลบแล้ว',
                        'success'
                    ).then(() => {
                        location.reload();
                    })
                }
            })
        }
    </script>
@endsection
