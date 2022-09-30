
@extends('layouts.fordashboard')

@section('content')

@foreach ($users as $user)
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
                    <option value="{{ $user->level}}">{{ $user->level }}</option>
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
                    <option value="{{ $user->status }}"><?php  if ($user->status == '0') {echo 'off' ;}elseif ($user->status == '1') {echo 'on' ; } ?></option>
                    <option value="0">off</option>
                    <option value="1">on</option>
                </select>
            </div>


        </div>
    </div>
   
</form>
@endforeach
@endsection