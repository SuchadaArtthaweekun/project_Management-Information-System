@extends('layouts.std-dashboard')

@section('content')
    @if (Session::get('status'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>ดำเนินการอัปโหลดเสร็จสิ้นแล้ว</strong>
        </div>
    @endif

    <div class="titledashboard">
        <h3>โครงงานนักศึกษาของคุณ</h3>
    </div>
    <div class="btnadd">
        <button type="button" class="btn btn-primary addpro" data-bs-toggle="modal" data-bs-target="#modal_stdAddProject">
            เพิ่มโครงงานนักศึกษา
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modal_stdAddProject" tabindex="-1" aria-labelledby="modal_stdAddProject"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มโครงงานนักศึกษา</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <form method="get" action="{{ route('addproject') }}"> --}}
                    <form method="get" action="{{ route('stdAddProject') }}" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="col-md-12">

                                @csrf
                                <div class="form-group">
                                    <label for="author">ชื่อผู้ทำคนที่ 1</label>
                                    <input type="text" name="author" class="form-control"
                                        placeholder="ชื่อผู้ทำคนที่ 1">
                                </div>

                                <div class="form-group">
                                    <label for="co_author">ชื่อผู้ทำคนที่ 2</label>
                                    <input type="text" name="co_author" class="form-control"
                                        placeholder="ชื่อ-สกุล (อังกฤษ)">
                                </div>

                                <div class="form-group">
                                    <label for="title_th">ชื่อโครงงาน (ไทย)</label>
                                    <input type="text" name="title_th" class="form-control"
                                        placeholder="ชื่อโครงงาน (ไทย)">
                                </div>

                                <div class="form-group">
                                    <label for="title_en">ชื่อโครงงาน (อังกฤษ)</label>
                                    <input type="text" name="title_en" class="form-control"
                                        placeholder="ชื่อโครงงาน (อังกฤษ)">
                                </div>

                                <div class="form-group">
                                    <label for="edition">ปีที่เผยแพร่</label>
                                    <input type="number" placeholder="YYYY" min="2530" max="2600" name="edition"
                                        action="datepicker" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email_author">อีเมลผู้ทำคนที่ 1</label>
                                    <input type="text" class="form-control" name="email_author">
                                </div>
                                <div class="form-group">
                                    <label for="email_co_author">อีเมลผู้ทำคนที่ 2</label>
                                    <input type="text" class="form-control" name="email_co_author">
                                </div>
                                <div class="form-group">
                                    <label for="tel_author">เบอร์โทรผู้ทำคนที่ 1</label>
                                    <input type="text" class="form-control" name="tel_author">
                                </div>
                                <div class="form-group">
                                    <label for="tel_co_author">เบอร์โทรผู้ทำคนที่ 2</label>
                                    <input type="text" class="form-control" name="tel_co_author">
                                </div>


                                <div class="form-group">
                                    <label for="abtract">บทคัดย่อ</label>
                                    <textarea name="abtract" id="abtract" cols="30" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="adviser">ที่ปรึกษา</label>
                                    <select class="form-select" id="exampleFormControlSelect1" name="adviser"
                                        placeholder="ที่ปรึกษา">
                                        @foreach ($advisers as $adv)
                                            <option value="{{ $adv->adviser_id }}">{{ $adv->adviser_fullname_th }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="adviser2">ที่ปรึกษาร่วม</label>
                                    <select class="form-select" id="exampleFormControlSelect1" name="adviser2"
                                        placeholder="ที่ปรึกษา">
                                        <option value="">ไม่มีที่ปรึกษาร่วม</option>
                                        @foreach ($advisers as $adv)
                                            <option value="{{ $adv->adviser_id }}">{{ $adv->adviser_fullname_th }}</option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="cate_id">หมวดหมู่โครงงาน</label>
                                    <select class="form-select" id="exampleFormControlSelect1" name="cate_id"
                                        placeholder="หมวดหมู่โครงงาน">
                                        <option selected>หมวดหมู่โครงงาน</option>
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->cate_id }}">{{ $cate->catename }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="branch">แขนงวิชา</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="branch"
                                        placeholder="แขนงวิชา">

                                        <option selected>
                                        <option value="CS">CS</option>
                                        <option value="CN">CN</option>
                                        <option value="MG">MG</option>

                                    </select>
                                </div> --}}

                                <div class="form-group">
                                    <label for="gen">รุ่นปี</label>
                                    <input type="text" name="gen" class="form-control" placeholder="รุ่นปี">
                                </div>

                                <div class="hideid">
                                    <label for="id">ผู้เพิ่มโครงงาน</label>
                                    <input type="text" name="id" class="form-control"
                                        value="{{ Auth::user()->id }}">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary" onclick="conf()">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <table class="table table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>ผู้จัดทำ</th>
                <th>ชื่อโครงงาน (ไทย)</th>
                <th>ชื่อโครงงาน (อังกฤษ)</th>
                <th>ปีที่พิมพ์</th>
                {{-- <th><strong>บทความ</strong></th> --}}
                {{-- <th><strong>บทคัดย่อ</strong></th> --}}
                {{-- <th><strong>ที่ปรึกษา</strong></th> --}}
                <th>เผยแพร่</th>
                <th>รุ่น</th>
                <th>หมวดหมู่โครงงาน</th>
                <th>แก้ไข / ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $pro)
                <tr>


                    <th>{{ $pro->project_id }}</th>
                    <th class="tauthor">{{ $pro->author }} {{ $pro->co_author }}
                    </th>
                    <th>{{ $pro->title_th }}</th>
                    <th>{{ $pro->title_en }}</th>
                    <th>{{ $pro->edition }}</th>



                    <th><?php if ($pro->published == '0') {
                        echo 'ยังไม่เผยแพร่';
                    } elseif ($pro->published == '1') {
                        echo 'เผยแพร่แล้ว';
                    } ?>
                    </th>
                    <th>{{ $pro->gen }}</th>
                    <th>{{ $pro->catename }}</th>
                    <th>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal_{{ $pro->project_id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal_{{ $pro->project_id }}" tabindex="-1"
                            aria-labelledby="modal_{{ $pro->project_id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขโครงงาน</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('stdUpdateproject') }}">
                                        <div class="modal-body">
                                            <div class="col-md-12">

                                                @csrf
                                                <div class="form-group">
                                                    <label for="author">ชื่อผู้ทำคนที่ 1</label>
                                                    <input type="hidden" value="{{ $pro->project_id }}"
                                                        name="project_id">
                                                    <input type="text"
                                                        value="{{ $pro->author }}"class="form-control" name="author">
                                                </div>
                                                <div class="form-group">
                                                    <label for="co_author">ชื่อผู้ทำคนที่ 2</label>
                                                    <input type="text" value="{{ $pro->co_author }}"
                                                        class="form-control" name="co_author">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_author">อีเมลผู้ทำคนที่ 1</label>
                                                    <input type="text" value="{{ $pro->email_author }}"
                                                        class="form-control" name="email_author">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email_co_author">อีเมลผู้ทำคนที่ 2</label>
                                                    <input type="text" value="{{ $pro->email_co_author }}"
                                                        class="form-control" name="email_co_author">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel_author">เบอร์โทรผู้ทำคนที่ 1</label>
                                                    <input type="text" value="{{ $pro->tel_author }}"
                                                        class="form-control" name="tel_author">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel_co_author">เบอร์โทรผู้ทำคนที่ 2</label>
                                                    <input type="text" value="{{ $pro->tel_co_author }}"
                                                        class="form-control" name="tel_co_author">
                                                </div>

                                                <div class="form-group">
                                                    <label for="title_th">ชื่อโครงงาน (ไทย)</label>
                                                    <input type="text" value="{{ $pro->title_th }}"
                                                        class="form-control" name="title_th">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title_en">ชื่อโครงงาน (อังกฤษ)</label>
                                                    <input type="text" value="{{ $pro->title_en }}"
                                                        class="form-control" name="title_en">
                                                </div>
                                                <div class="form-group">
                                                    <label for="edition">ปีที่เผยแพร่</label>
                                                    <input type="text" value="{{ $pro->edition }}"
                                                        class="form-control" name="edition">
                                                </div>

                                                <div class="form-group">
                                                    <label for="abtract">บทคัดย่อ</label>
                                                    <textarea name="abtract" id="abtract" cols="30" rows="4" class="form-control"
                                                        value="{{ $pro->abtract }}" class="form-control">{{ $pro->abtract }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="adviser">ที่ปรึกษา</label>
                                                    <select class="form-select" id="exampleFormControlSelect1"
                                                        name="adviser" placeholder="ที่ปรึกษา">
                                                        <option value="{{ $pro->adviser }}">
                                                            @foreach ($advisers as $adv)
                                                                <?php
                                                                if ($pro->adviser == $adv->adviser_id) {
                                                                    echo $adv->adviser_fullname_th;
                                                                }
                                                                ?>
                                                            @endforeach
                                                        </option>;


                                                        @foreach ($advisers as $adv)
                                                            <option value="{{ $adv->adviser_id }}">
                                                                {{ $adv->adviser_fullname_th }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="co_adviser">ที่ปรึกษาร่วม</label>
                                                    <select class="form-select" id="exampleFormControlSelect1"
                                                        name="adviser2" placeholder="ที่ปรึกษา">
                                                        <option value="{{ $pro->co_adviser }}">
                                                            @foreach ($advisers as $adv)
                                                                <?php
                                                                if ($pro->co_adviser == $adv->adviser_id) {
                                                                    echo $adv->adviser_fullname_th;
                                                                }
                                                                ?>
                                                            @endforeach
                                                        </option>;
                                                        <option value="">ไม่มีที่ปรึกษาร่วม</option>
                                                        @foreach ($advisers as $adv)
                                                            <option value="{{ $adv->adviser_id }}">
                                                                {{ $adv->adviser_fullname_th }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="branch">แขนงวิชา</label>
                                                    <select class="form-select" id="exampleFormControlSelect1"
                                                        name="branch" placeholder="แขนงวิชา">
                                                        <option selected>{{ $pro->branch }}
                                                        <option value="CS">CS</option>
                                                        <option value="CN">CN</option>
                                                        <option value="MG">MG</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gen">รุ่น</label>
                                                    <input type="text" value="{{ $pro->gen }}"
                                                        class="form-control" name="gen">

                                                </div>

                                                <div class="form-group">
                                                    <label for="cate_id">หมวดหมู่โครงงาน : {{ $pro->cate_id }} </label>
                                                    <select class="form-select" id="exampleFormControlSelect1"
                                                        name="edt_cate_id" id="etd_cate_id"
                                                        placeholder="หมวดหมู่โครงงาน">
                                                        @foreach ($categories as $cate)
                                                            <option value="{{ $cate->cate_id }}"
                                                                @if ($pro->cate_id === $cate->cate_id) selected @endif>
                                                                {{-- @if ($pro->cate_id = $cate->cate_id) selected @endif> --}}
                                                                {{ $cate->catename }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary"
                                                onclick="conf()">บันทึก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                        <button type="button" class="btn btn-danger" onclick="del({{ $pro->project_id }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                   
                        {{-- add file --}}
                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#modal_file_{{ $pro->project_id }}">
                            <i class="fa-light fa-plus"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal_file_{{ $pro->project_id }}" tabindex="-1"
                            aria-labelledby="modal_file_{{ $pro->project_id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มไฟล์เอกสาร</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    {{-- <form method="get" action="{{ route('addproject') }}"> --}}
                                    <form method="post" action="{{ route('stdUploadfile') }}"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="col-md-12">

                                                @csrf
                                                <div>

                                                    <input type="text" name="project_id" placeholder="Choose file"
                                                        id="project_id" value="{{ $pro->project_id }}" hidden>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" name="file[]" placeholder="Choose file"
                                                            id="file" multiple="multiple">
                                                        @error('file')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">ประเเภทไฟล์</label>
                                                    <select class="form-select" id="exampleFormControlSelect1"
                                                        name="type" placeholder="">
                                                        <option value="โครงงาน">โครงงาน</option>
                                                        <option value="แบบเสนอ">แบบเสนอ</option>
                                                        <option value="บทความวิจัย">บทความวิจัย</option>
                                                    </select>
                                                </div>



                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary"
                                                onclick="conf()">บันทึก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end add file --}}

                        <a href="/stdAllFiles/{{ $pro->project_id }}">
                            <button type="button" class="btn btn-warning">
                                <i class="fa-solid fa-file"></i></button>
                        </a>


                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>


    

    <script>
        const del = (id) => {
            Swal.fire({
                title: 'ต้องการลบโครงงาน ?',
                text: "คุณจะไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/deletepro/${id}`).then((respons) => {
                        console.log(respons)
                    })
                    Swal.fire(
                        'ลบสำเร็จ',
                        'โครงงานนี้ถูกลบแล้ว',
                        'success'
                    ).then(() => {
                        location.reload();
                    })
                }
            })
        }


        const conf = (id) => {
            Swal.fire('บันทึกสำเร็จ')
        }


        
        const conflink = (id) => {
            Swal.fire({
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/stdAddProject`).then((respons) => {
                        console.log(respons)
                    })
                    Swal.fire(
                        'เพิ่มสำเร็จ',
                        'success'
                    ).then(() => {
                        location.reload();
                    })
                }
            })
        }
    </script>
@endsection
