@extends('layouts.fordashboard')

@section('content')
    <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}">
        
            @csrf
            <div class="row">
                <div>
                    @foreach ($projects as $pro)
                    <input type="text" name="project_id" placeholder="Choose file" id="project_id" value="{{ $pro->project_id }}">
                    @endforeach
                </div>
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
                    <select class="form-control" id="exampleFormControlSelect1" name="type" placeholder="">
                        <option value="โครงงาน">โครงงาน</option>
                        <option value="แบบเสนอ">แบบเสนอ</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlSelect1">โครงงาน</label>
                    {{-- <input type="text" name="project_id" class="form-control" value="{{ $projects->project_id }}" > --}}
                </div>
        

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" id="submit">ตกลง</button>
        </div>
        </div>

    </form>
@endsection
