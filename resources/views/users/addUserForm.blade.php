@extends('layouts.fordashboard')

@section('content')

<div class="col-9 addUserForm">
    <form method="get" action="{{route('addUser')}}">
        <div class="form-group">
            <label for="name">ชื่อ-สกุล</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ-สกุล">
        </div>
        <div class="form-group">
            <label for="name_en">ชื่อ-สกุล (อังกฤษ)</label>
            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="ชื่อ-สกุล (อังกฤษ)">
        </div>
        <div class="form-group">
            <label for="email">อีเมล</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล">
        </div>
        <div class="mt-4">
            <label for="password">รหัสผ่าน</label>
            <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>
       
        <div class="form-group">
            <label for="user_tel">เบอร์โทร</label>
            <input type="text" class="form-control" id="user_tel" name="user_tel" placeholder="เบอร์โทร">
        </div>

        <div class="form-group">
            <label for="note">รหัสนักศึกษาหรือรหัสอาจารย์</label>
            <input type="text" class="form-control" id="note" name="note" placeholder="รหัสนักศึกษา">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">ระดับผู้ใช้</label>
            <select class="form-control" id="exampleFormControlSelect1" name="level" placeholder="รหัสนักศึกษา">
                <option selected>เลือกระดับผู้ใช้</option>
                <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                <option value="อาจารย์">อาจารย์</option>
                <option value="นักศึกษา">นักศึกษา</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">สถานะ</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status" placeholder="สถานะผู้ใช้">
                <option value="0">off</option>
                <option value="1">on</option>
            </select>
        </div>

        <button type="submit"  value = "Add user" class="btn btn-primary">Submit</button>
         
    </form>
</div>
    

@endsection