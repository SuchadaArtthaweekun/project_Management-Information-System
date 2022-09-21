@extends('layouts.fordashboard')

@section('content')
    <section>
        <div class="container">
            <form method="get" action="{{ route('searchProject') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="cate_id" class="col-sm-2 col-form-label">หมวดหมู่โครงงาน</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="cate_id" id="ate_id"
                            placeholder="หมวดหมู่โครงงาน">
                            <option value="all">ทั้งหมด</option>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->cate_id }}">
                                    {{ $cate->catename }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adviser" class="col-sm-2 col-form-label">ที่ปรึกษา</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="adviser" id="adviser"
                            placeholder="ที่ปรึกษา">
                            <option value="all">ทั้งหมด</option>
                            @foreach ($advisers as $pro)
                                <option value="{{ $pro->adviser_id }}">
                                    {{ $pro->adviser_fullname_th }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title_th" class="col-sm-2 col-form-label">ชื่อโปรเจค</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title_th" placeholder="ชื่อโปรเจค" name="title_th">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edition" class="col-sm-2 col-form-label">ปีที่พิมพ์</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="edition" placeholder="ปีที่พิมพ์" name="edition">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">ชื่อผู้จัดทำ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="author" placeholder="ชื่อผู้จัดทำ" name="author">
                    </div>
                </div>
               


                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
