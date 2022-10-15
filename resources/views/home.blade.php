@extends('layouts.home')

@section('menu')
@endsection

@section('content')
    <section class="section">
        <div class="bg section">
            <div class="section-content relative">
                @if ( Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>ดำเนินการสมัครเสร็จสิ้นแล้ว รอการอนุมัติ</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="row row-large align-middle">
                    <div class="col">
                        <div class="col inner">
                            <h2>
                                สาขาวิชาเทคโนโลยีสารสนเทศ
                            </h2>
                            <h5>
                                คณะวิทยาศาสตร์ มหาวิทยาลัยราชภัฏบุรีรัมย์
                                เป็นองค์กรแห่งการเรียนรู้ที่หลากหลายทางเทคโนโลยีของภาคตะวันออกเฉียงเหนือและแข่งขันได้ในระดับสากล..
                                <br>
                                อาคารเทคโนโลยีสารสนเทศ มหาวิทยาลัยราชภัฏบุรีรัมย์ ถ.จิระ ต.ในเมือง อ.เมือง จ.บุรีรัมย์
                                31000
                            </h5>
                        </div>
                    </div>
                    <div class="col ">
                        <div class="bannerhome">
                            <img src="{{ asset('/img/education.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="homehilight">



        <div class="col-8">
            <div class="homesearch">
                <form method="get" action="{{ route('searchhome') }}" enctype="multipart/form-data" class="search">
                    <h3 for="" class="searchtxt">สืบค้นโครงงานนักศึกษา</h3>
                    @csrf
                    <div class="form-group row">
                        <label for="cate_id" class="col-sm-3 col-form-label">หมวดหมู่โครงงาน</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" name="cate_id" id="ate_id"
                                placeholder="หมวดหมู่โครงงาน" >
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
                        <label for="adviser" class="col-sm-3 col-form-label">ที่ปรึกษา</label>
                        <div class="col-sm-9">
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
                        <label for="title_th" class="col-sm-3 col-form-label">ชื่อโปรเจค</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title_th" placeholder="ชื่อโปรเจค"
                                name="title_th">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edition" class="col-sm-3 col-form-label">ปีที่พิมพ์</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edition" placeholder="ปีที่พิมพ์"
                                name="edition">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="author" class="col-sm-3 col-form-label">ชื่อผู้จัดทำ</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="author" placeholder="ชื่อผู้จัดทำ"
                                name="author">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 search">
                            <button type="submit" class="btn btn-primary center">ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="homenews">
        <div class="row">
            <div class="col-8">
                <h1>เทคโนโลยีสารสนเทศ</h1>
                <h2>มุ่งเน้น</h2>
                <h5>
                    “ผลิตบัณฑิตที่มีความรู้ความเชี่ยวชาญด้านเทคโนโลยีสารสนเทศ มี ทักษะด้านฮาร์ดแวร์ ซอฟต์แวร์คอมพิวเตอร์
                    สามารถประยุกต์
                    ความรู้เพื่อพัตนาจานด้านเทคโนโลยีสารสนเทศสำหรับองค์กร และท้องถิ่น โดยยึดมั่นคุณธรรม
                    จริยธรรมในวิชาชีพ "
                </h5>
            </div>
            <div class="col-4">
                <div class="col homeimg">
                    <img src="{{ asset('/img/418itbru05.jpg') }}">
                </div>
            </div>
        </div>
    </div>
    </div>
    <section>
        <div class="container">


    </section>



    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Please check the form below for errors
        </div>
    @endif
@endsection
