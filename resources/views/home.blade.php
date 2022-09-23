@extends('layouts.web')

@section('menu')
@endsection

@section('content')
    <section class="section">
        <div class="bg section">
            <div class="section-content relative">
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
                    <div class="col">
                        <img src="public/img/education.jpg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="homehilight">
        <div class="sidebarhome">
            <div class="col-4">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
                    <a href="/"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                        <span class="fs-4">Sidebar</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#home"></use>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2"></use>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#table"></use>
                                </svg>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#grid"></use>
                                </svg>
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#people-circle"></use>
                                </svg>
                                Customers
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                            <strong>mdo</strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-8">
            <div class="homesearch">
                <form method="get" action="{{ route('searchhome') }}" enctype="multipart/form-data" class="search">
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
                            <input type="text" class="form-control" id="title_th" placeholder="ชื่อโปรเจค"
                                name="title_th">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edition" class="col-sm-2 col-form-label">ปีที่พิมพ์</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edition" placeholder="ปีที่พิมพ์"
                                name="edition">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="author" class="col-sm-2 col-form-label">ชื่อผู้จัดทำ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author" placeholder="ชื่อผู้จัดทำ"
                                name="author">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 search">
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
@endsection
