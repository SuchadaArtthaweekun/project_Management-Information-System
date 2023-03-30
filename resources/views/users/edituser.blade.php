@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <form method="get" action="{{ route('updateuser') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">ชื่อ-สกุล</label>
                            <input type="hidden" value="{{ $users->id }}" name="id">
                            <input type="text" name="name" class="form-control"
                                placeholder="Enter
                        post title" value="{{ $users->name }}">
                        </div>

                        <div class="form-group">
                            <label for="title">ชื่อ-สกุล (อังกฤษ)</label>
                            <input type="text" name="name_en" class="form-control"
                                placeholder="Enter
                        post title" value="{{ $users->name_en }}">
                        </div>

                        <div class="form-group">
                            <label for="title">อีเมล</label>
                            <input type="text" name="email" class="form-control"
                                placeholder="Enter
                        post title" value="{{ $users->email }}">
                        </div>

                        <div class="form-group">
                            <label for="title">รหัสผ่าน</label>
                            <input type="text" name="password" class="form-control"
                                placeholder="Enter
                        post title" value="{{ $users->password }}">
                        </div>

                        <div class="form-group">
                            <label for="user_tel">เบอร์โทร</label>
                            <input type="text" name="user_tel" class="form-control"
                                placeholder="Enter
                        post title" value="{{ $users->user_tel }}">
                        </div>

                        <div class="form-group">
                            <label for="note">รหัสนักศึกษาหรือรหัสอาจารย์</label>
                            <input type="text" name="note" class="form-control"
                                placeholder="Enter
                        post title" value="{{ $users->note }}">
                        </div>

                        <div class="form-group">
                            <label for="level">ระดับผู้ใช้</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="level"
                                placeholder="รหัสนักศึกษา" value="{{ $users->level }}">
                                <option selected>เลือกระดับผู้ใช้</option>
                                <option value="ผู้ดูแลระบบ">1 : ผู้ดูแลระบบ</option>
                                <option value="อาจารย์">2 : อาจารย์</option>
                                <option value="นักศึกษา">3 : นักศึกษา</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="note">สถานะ</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="status"
                                placeholder="สถานะผู้ใช้" value="{{ $users->status }}">
                                <option value="0">off</option>
                                <option value="1">on</option>
                            </select>
                        </div>



                        <button type="submit" href="allcate">ยืนยัน</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+Or
        CXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu
        735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMM
        V+rV" crossorigin="anonymous"></script>
    </body>
@endsection
