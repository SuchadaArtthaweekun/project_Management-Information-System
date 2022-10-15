@extends('layouts.tch-dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    {{-- <h3>Your Profile</h3> --}}
                    {{-- {{ $users }} --}}

                    <form action="" class="memberUser">
                        <div>
                           รหัสผู้ใช้ : {{ Auth::user()->id }}
                        </div>
                        <div>
                            <p> ชื่อ-สกุล : {{ Auth::user()->name }} </p <p>ชื่อ-สกุล(อังกฤษ) : {{ Auth::user()->name_en }}
                            </p>
                            <p>อีเมล : {{ Auth::user()->email }}</p>
                            <p>ระดับผู้ใช้ : {{ Auth::user()->level }}</p>
                            <p>เบอร์โทร : {{ Auth::user()->user_tel }}</p>
                            <p>รหัสนักศึกษา : {{ Auth::user()->note }}</p>
                        </div>
                        <div class="btneditmembr">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal_{{ Auth::user()->id }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <div class="editmember">
                                <!-- Modal -->
                                <div class="modal fade" id="modal_{{ Auth::user()->id }}" tabindex="-1"
                                    aria-labelledby="modal_{{ Auth::user()->id }}" aria-hidden="true">
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
                                                            <input type="hidden" value="{{ Auth::user()->id }}"
                                                                name="id">
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Enter
                      post title"
                                                                value="{{ Auth::user()->name }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title">ชื่อ-สกุล (อังกฤษ)</label>
                                                            <input type="text" name="name_en" class="form-control"
                                                                placeholder="Enter
                      post title"
                                                                value="{{ Auth::user()->name_en }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title">อีเมล</label>
                                                            <input type="text" name="email" class="form-control"
                                                                placeholder="Enter
                      post title"
                                                                value="{{ Auth::user()->email }}">
                                                        </div>


                                                        <input type="hidden" name="password" class="form-control"
                                                            value="{{ Auth::user()->password }}">
                                                        <input type="hidden" name="level" class="form-control"
                                                            value="{{ Auth::user()->level }}">
                                                        <input type="hidden" name="status" class="form-control"
                                                            value="{{ Auth::user()->status }}">

                                                        <div class="form-group">
                                                            <label for="user_tel">เบอร์โทร</label>
                                                            <input type="text" name="user_tel" class="form-control"
                                                                placeholder="Enter
                      post title"
                                                                value="{{ Auth::user()->user_tel }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="note">รหัสนักศึกษาหรือรหัสอาจารย์</label>
                                                            <input type="text" name="note" class="form-control"
                                                                placeholder="Enter
                      post title"
                                                                value="{{ Auth::user()->note }}">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        href="{{ route('alluser') }}">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
