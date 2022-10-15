@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                {{-- add users --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_adduser">
                    Add User
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modal_adduser" tabindex="-1" aria-labelledby="modal_adduser" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add user</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="get" action="{{ route('addUser') }}">
                                <div class="modal-body">
                                    <div class="col-md-12">

                                        @csrf
                                        <div class="form-group">
                                            <label for="title">ชื่อ-สกุล</label>
                                            <input type="hidden" name="id">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="ชื่อ-สกุล">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">ชื่อ-สกุล (อังกฤษ)</label>
                                            <input type="text" name="name_en" class="form-control"
                                                placeholder="ชื่อ-สกุล (อังกฤษ)">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">อีเมล</label>
                                            <input type="text" name="email" class="form-control" placeholder="อีเมล">
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="title">รหัสผ่าน</label>
                                            <input type="text" name="password" class="form-control"
                                                placeholder="รหัสผ่าน">
                                        </div> --}}

                                        <div class="mt-4">
                                            <x-label for="password" :value="__('Password')" />

                                            <x-input id="password" class="form-control" type="password"
                                                name="password" required autocomplete="new-password" />
                                        </div>
                                        <div class="mt-4">
                                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-input id="password_confirmation" class="form-control" type="password"
                                                name="password_confirmation" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="user_tel">เบอร์โทร</label>
                                            <input type="text" name="user_tel" class="form-control"
                                                placeholder="รหัสผ่าน">
                                        </div>

                                        <div class="form-group">
                                            <label for="username">รหัสนักศึกษาหรือรหัสอาจารย์</label>
                                            <input type="text" name="note" class="form-control"
                                                placeholder="รหัสนักศึกษาหรือรหัสอาจารย์">
                                        </div>

                                        <div class="form-group">
                                            <label for="generation">รุ่น ปีการศึกษาที่เข้าเรียน</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="generation"
                                                placeholder="รุ่น ปีการศึกษาที่เข้าเรียน">
                                                <option selected>เลือกปีการศึกษาที่เข้าเรียน</option>
                                                <option value="65">65</option>
                                                <option value="64">64</option>
                                                <option value="63">63</option>
                                                <option value="62">62</option>
                                                <option value="61">61</option>
                                                <option value="60">60</option>
                                                <option value="59">59</option>
                                                <option value="58">58</option>
                                                <option value="57">57</option>
                                                <option value="56">56</option>
                                                <option value="55">55</option>
                                                <option value="54">54</option>
                                                <option value="53">53</option>
                                                <option value="52">52</option>
                                                <option value="51">51</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="level">ระดับผู้ใช้</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="level"
                                                placeholder="รหัสนักศึกษา">
                                                <option selected>เลือกระดับผู้ใช้</option>
                                                <option value="ผู้ดูแลระบบ">1 : ผู้ดูแลระบบ</option>
                                                <option value="อาจารย์">2 : อาจารย์</option>
                                                <option value="นักศึกษา">3 : นักศึกษา</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="note">สถานะ</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="status"
                                                placeholder="สถานะผู้ใช้">
                                                <option value="0">off</option>
                                                <option value="1">on</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" href="{{ route('alluser') }}">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            {{-- show user --}}
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>No</strong></th>
                        <th><strong>ชื่อ</strong></th>
                        <th><strong>ชื่อ (อังกฤษ)</strong></th>
                        <th><strong>อีเมล</strong></th>
                        <th><strong>ระดับผู้ใช้</strong></th>
                        <th><strong>รหัสนักศึกษาหรือรหัสอาจารย์</strong></th>
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
                            <th>{{ $user->username }}</th>
                            <th><?php if ($user->status == '0') {
                                echo 'off';
                            } elseif ($user->status == '1') {
                                echo 'on';
                            } ?></th>
                            <th>{{ $user->user_tel }}</th>
                            <th>


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_{{ $user->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
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

                                                        {{-- <div class="form-group">
                                                            <label for="title">รหัสผ่าน</label>
                                                            <input type="text" name="password" class="form-control"
                                                                placeholder="Enter
                                                      post title" 
                                                                value="{{ $user->password }}">
                                                        </div> --}}


                                                        <div class="form-group">
                                                            <label for="user_tel">เบอร์โทร</label>
                                                            <input type="text" name="user_tel" class="form-control"
                                                                placeholder="Enter
                                                      post title"
                                                                value="{{ $user->user_tel }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="username">รหัสนักศึกษาหรือรหัสอาจารย์</label>
                                                            <input type="text" name="note" class="form-control"
                                                                placeholder="Enter
                                                      post title"
                                                                value="{{ $user->username }}">
                                                        </div>

                                                        {{-- <div class="form-group">
                                                            <label for="generation">รุ่น ปีการศึกษาที่เข้าเรียน</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="generation" placeholder="รุ่น ปีการศึกษาที่เข้าเรียน">
                                                                <option selected value="{{ $user->gen }}">{{ $user->gen }}</option>
                                                                <option value="65">65</option>
                                                                <option value="64">64</option>
                                                                <option value="63">63</option>
                                                                <option value="62">62</option>
                                                                <option value="61">61</option>
                                                                <option value="60">60</option>
                                                                <option value="59">59</option>
                                                                <option value="58">58</option>
                                                                <option value="57">57</option>
                                                                <option value="56">56</option>
                                                                <option value="55">55</option>
                                                                <option value="54">54</option>
                                                                <option value="53">53</option>
                                                                <option value="52">52</option>
                                                                <option value="51">51</option>
                                                                <option value="50">50</option>
                                                            </select>
                                                        </div> --}}

                                                        <div class="form-group">
                                                            <label for="level">ระดับผู้ใช้</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="level" placeholder="รหัสนักศึกษา"
                                                                value="{{ $user->level }}">
                                                                <option value="{{ $user->level }}">{{ $user->level }}
                                                                </option>
                                                                <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                                                                <option value="อาจารย์">อาจารย์</option>
                                                                <option value="นักศึกษา">นักศึกษา</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="note">สถานะ</label>
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="status" placeholder="สถานะผู้ใช้"
                                                                value="{{ $user->status }}">
                                                                <option value="{{ $user->status }}"><?php if ($user->status == '0') {
                                                                    echo 'off';
                                                                } elseif ($user->status == '1') {
                                                                    echo 'on';
                                                                } ?>
                                                                </option>
                                                                <option value="0">off</option>
                                                                <option value="1">on</option>
                                                            </select>
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
                                <a href=" /deleteUser/{{ $user->id }}">

                                    
                                </a>
                                <button type="button" class="btn btn-danger" onclick="del({{ $user->id }})"><i class="fa-solid fa-trash"></i></button>
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
                title: 'Are you sure? ' + id,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/deleteUser/${id}`).then((respons)=>{console.log(respons)})
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ).then(()=>{location.reload();})
                }
            })
        }
    </script>
@endsection
