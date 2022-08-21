@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                <a href="{{ route('addUserForm') }}"><button class="btn btn-primary">Add User</button></a>

            </div>
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>No</strong></th>
                        <th><strong>ชื่อ</strong></th>
                        <th><strong>ชื่อ (อังกฤษ)</strong></th>
                        <th><strong>อีเมล</strong></th>
                        <th><strong>ระดับผู้ใช้</strong></th>
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
                            <th>{{ $user->status }}</th>
                            <th>{{ $user->user_tel }}</th>
                            <th>
                                <a href="/edituser/{{ $user->id }}">
                                    <button type="button" class="btn btn-success">แก้ไข</button>
                                </a>
                                <a href=" /deleteUser/{{ $user->id }}">
                                    <button type="button" class="btn btn-danger" onclick="alert">ลบ</button>
                                </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_{{ $user->id }}">
                                    แก้ไข
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal_{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="modal_{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">edit user</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="get" action="{{ route('updateuser') }}">
                                                <div class="modal-body">
                                                    <div class="col-md-12">

                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="title">ชื่อ-สกุล</label>
                                                            <input type="hidden" value="{{ $user->id }}"
                                                                name="id">
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Enter
                                                      post title"
                                                                value="{{ $user->name }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title">ชื่อ-สกุล (อังกฤษ)</label>
                                                            <input type="text" name="name_en" class="form-control"
                                                                placeholder="Enter
                                                      post title"
                                                                value="{{ $user->name_en }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title">อีเมล</label>
                                                            <input type="text" name="email" class="form-control"
                                                                placeholder="Enter
                                                      post title"
                                                                value="{{ $user->email }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title">รหัสผ่าน</label>
                                                            <input type="text" name="password" class="form-control"
                                                                placeholder="Enter
                                                      post title"
                                                                value="{{ $user->password }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="user_tel">เบอร์โทร</label>
                                                            <input type="text" name="user_tel" class="form-control"
                                                                placeholder="Enter
                                                      post title"
                                                                value="{{ $user->user_tel }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="note">รหัสนักศึกษาหรือรหัสอาจารย์</label>
                                                            <input type="text" name="note" class="form-control"
                                                                placeholder="Enter
                                                      post title"
                                                                value="{{ $user->note }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="level">ระดับผู้ใช้</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="level" placeholder="รหัสนักศึกษา"
                                                                value="{{ $user->level }}">
                                                                <option selected>เลือกระดับผู้ใช้</option>
                                                                <option value="ผู้ดูแลระบบ">1 : ผู้ดูแลระบบ</option>
                                                                <option value="อาจารย์">2 : อาจารย์</option>
                                                                <option value="นักศึกษา">3 : นักศึกษา</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="note">สถานะ</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="status" placeholder="สถานะผู้ใช้"
                                                                value="{{ $user->status }}">
                                                                <option value="0">off</option>
                                                                <option value="1">on</option>
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" href="{{route('alluser')}}">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </body>

    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    </script>
@endsection
