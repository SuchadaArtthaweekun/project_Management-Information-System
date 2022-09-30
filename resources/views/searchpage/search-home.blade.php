@extends('layouts.fordashboard')

@section('content')
    <section>
        <div class="container">
            <form method="get" action="{{ route('searchhome') }}" >
                @csrf
               
                <div class="form-group row">
                    <label for="cate_id" class="col-sm-2 col-form-label">ประเภทการค้นหา</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="exampleFormControlSelect1" name="type" id="ate_id"
                            placeholder="หมวดหมู่โครงงาน">
                            <option value="all">ทั้งหมด</option>
                            <option value="author">ชื่อผู้จัดทำ</option>
                            <option value="title_th">ชื่อโปรเจค</option>
                            <option value="edition">ปีที่พิมพ์</option>
                            <option value="cate_id">หมวดหมู่โครงงาน</option>
                            <option value="adviser">ที่ปรึกษา</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">คำค้นหา</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="edition" placeholder="คำค้นหา" name="name">
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
