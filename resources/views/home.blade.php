@extends('layouts.home')

@section('menu')
@endsection

@section('content')
    <div class="container-fluid">


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


        {{-- <img class="banner" src="{{ asset('/img//banner/banner.jpg') }}" alt=""> --}}
        <div class="headimg">
            <img class="" src="{{ asset('/img/banner/glenn-carstens-peters-npxXWgQ33ZQ-unsplash-short2.jpg') }}"
                alt="">
        </div>
        <div class="bannertop">

            <div class="row titlebanner">

                {{-- <div class="col action">
                    <div class="actiontxt">
                        <h3>โครงงานนักศึกษาสาขาวิชาเทคโนโลยีสารสนเทศ มหาวิทยาลัยราชภัฏบุรีรัมย์</h3>
                        
                        <div class="bannerhome">
                            <img src="{{ asset('/img/418itbru05.jpg') }}">
                        </div>
                    </div>
                </div> --}}
                <div class="col-6">
                    <div class="col title">
                        <div class="titlesearch">
                            <form method="get" action="{{ route('searchhome') }}" enctype="multipart/form-data"
                                class="search">
                                <h3 for="" class="searchtxt">สืบค้นโครงงานนักศึกษา</h3>
                                @csrf
                                <div class="form-group row">
                                    <label for="cate_id" class="col-sm-4 col-form-label">หมวดหมู่โครงงาน</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="exampleFormControlSelect1" name="cate_id"
                                            id="ate_id" placeholder="หมวดหมู่โครงงาน">
                                            <option value="all">ทั้งหมด</option>
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->cate_id }}">
                                                    {{ $cate->catename }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row search">
                                    <label for="adviser" class="col-sm-4 col-form-label">ที่ปรึกษา</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="exampleFormControlSelect1" name="adviser"
                                            id="adviser" placeholder="ที่ปรึกษา">
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
                                    <label for="title_th" class="col-sm-4 col-form-label">ชื่อโปรเจค</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="title_th" placeholder="ชื่อโปรเจค"
                                            name="title_th">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="edition" class="col-sm-4 col-form-label">ปีที่พิมพ์</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="edition" placeholder="ปีที่พิมพ์"
                                            name="edition">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="author" class="col-sm-4 col-form-label">ชื่อผู้จัดทำ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="author" placeholder="ชื่อผู้จัดทำ"
                                            name="author">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 search">
                                        <button type="submit" class="btn-search">ค้นหา</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="showbook">

            </div>




        </div>
    </div>

    </section>
@endsection

<script>
    ff = () => {
        alert('You clicked the button!');
    }
</script>
