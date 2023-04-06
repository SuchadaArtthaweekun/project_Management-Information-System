@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div class="row editUser">
            <div class="col-8">
                <form method="post" action="{{ route('updateuserself') }}">
                    <div class="modal-body">
                        <div class="col-md-12">

                            @csrf
                            <div class="headEditUserPage">
                                <h4>แก้ไขข้อมูลส่วนตัว</h4>
                            </div>
                            <div class="form-group">
                                <label for="title">ชื่อ-สกุล</label>
                                <input type="hidden" value="{{Auth::user()->id}}" name="id">
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            </div>

                            <div class="form-group">
                                <label for="title">ชื่อ-สกุล (อังกฤษ)</label>
                                <input type="text" name="name_en" class="form-control" value="{{ Auth::user()->name_en }}">
                            </div>

                            <div class="form-group">
                                <label for="title">อีเมล</label>
                                <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>

                            <div class="form-group">
                                <label for="user_tel">เบอร์โทร</label>
                                <input type="text" name="user_tel" class="form-control" maxlength="10" value="{{ Auth::user()->user_tel }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary" onclick="conf()">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        const conf = (id) => {
            Swal.fire('บันทึกสำเร็จ')
        }
    </script>
@endsection
