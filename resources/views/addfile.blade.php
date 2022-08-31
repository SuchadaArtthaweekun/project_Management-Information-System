@extends('layouts.fordashboard')

@section('content')
<form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('uploadfile') }}">
    @csrf
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <input type="file" name="file" placeholder="Choose file" id="file">
                @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">ประเเภทไฟล์</label>
            <select class="form-control" id="exampleFormControlSelect1" name="type" placeholder="สถานะผู้ใช้">
                <option value="โครงงาน">โครงงาน</option>
                <option value="แบบเสนอ">แบบเสนอ</option>
            </select>
        </div>

        @foreach ($projects as $pro)
        <div class="form-group">
            <label for="exampleFormControlSelect1">โครงงาน</label>
            <input type="text" name="project_id" class="form-control" value="{{ $pro->project_id }}" >
        </div>
        @endforeach

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </div>
</form>
@endsection
