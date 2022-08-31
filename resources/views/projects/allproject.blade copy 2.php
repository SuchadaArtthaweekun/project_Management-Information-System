@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div class="btnadd">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal_{{ Auth::user()->name }}">
                    Add project
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modal_{{ Auth::user()->name }}" tabindex="-1"
                    aria-labelledby="modal_{{ Auth::user()->name }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            {{-- <form method="get" action="{{ route('addproject') }}"> --}}
                            <form method="get" action="{{ route('addProject') }}" enctype="multipart/form-data">
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
                                            <input type="number" placeholder="YYYY" min="2017" max="2100"
                                                name="edition" action="datepicker" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="article">บทความ</label>
                                            <textarea name="article" id="article" cols="30" rows="4" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="abtract">บทคัดย่อ</label>
                                            <textarea name="abtract" id="abtract" cols="30" rows="4" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="adviser">ที่ปรึกษา</label>
                                            <input type="text" name="adviser" class="form-control"
                                                placeholder="ที่ปรึกษา">
                                        </div>

                                        <div class="form-group">
                                            <label for="adviser">ที่ปรึกษาร่วม</label>
                                            <input type="text" name="adviser2" class="form-control"
                                                placeholder="ที่ปรึกษาร่วม">
                                        </div>



                                        <div class="form-group">
                                            <label for="cate_id">หมวดหมู่โครงงาน</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="cate_id"
                                                placeholder="หมวดหมู่โครงงาน">
                                                <option selected>หมวดหมู่โครงงาน</option>
                                                @foreach ($categories as $cate)
                                                    <option value="{{ $cate->cate_id }}">{{ $cate->catename }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="branch">แขนงวิชา</label>
                                            <input type="text" name="branch" class="form-control"
                                                placeholder="แขนงวิชา">
                                        </div>

                                        <div class="form-group">
                                            <label for="gen">รุ่นปี</label>
                                            <input type="text" name="gen" class="form-control"
                                                placeholder="รุ่นปี">
                                        </div>

                                        <div class="form-group">
                                            <label for="id">ผู้เพิ่มโครงงาน</label>
                                            <input type="text" name="id" class="form-control"
                                                value="{{ Auth::user()->id }}">
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="file" name="files" placeholder="Choose file"
                                                    id="files">
                                                @error('file')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" href="{{ route('allproject') }}">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>id</strong></th>
                        <th><strong>ชื่อผู้ทำคนที่ 1</strong></th>
                        <th><strong>ชื่อผู้ทำคนที่ 2</strong></th>
                        <th><strong>ชื่อโครงงาน (ไทย)</strong></th>
                        <th><strong>ชื่อโครงงาน (อังกฤษ)</strong></th>
                        <th><strong>ปีที่เผยแพร่</strong></th>
                        <th><strong>บทความ</strong></th>
                        <th><strong>บทคัดย่อ</strong></th>
                        <th><strong>ที่ปรึกษา</strong></th>
                        <th><strong>ที่ปรึกษาร่วม</strong></th>
                        <th><strong>แขนงวิชา</strong></th>
                        <th><strong>รุ่น</strong></th>
                        <th><strong>หมวดหมู่โครงงาน</strong></th>
                        <th><strong>action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $pro)
                        <tr>
                            <th>{{ $pro->project_id }}</th>
                            <th>{{ $pro->author }}</th>
                            <th>{{ $pro->co_author }}</th>
                            <th>{{ $pro->title_th }}</th>
                            <th>{{ $pro->title_en }}</th>
                            <th>{{ $pro->edition }}</th>
                            <th>{{ $pro->article }}</th>
                            <th>{{ $pro->abtract }}</th>
                            <th>{{ $pro->adviser }}</th>
                            <th>{{ $pro->co_adviser }}</th>
                            <th>{{ $pro->branch }}</th>
                            <th>{{ $pro->gen }}</th>
                            <th>{{ $pro->cate_id }}</th>
                            <th>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_editproject">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal_editproject" tabindex="-1"
                                    aria-labelledby="modal_editproject" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">edit project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form method="get" action="{{ route('updateproject') }}">
                                                <div class="modal-body">
                                                    <div class="col-md-12">

                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="author">ชื่อผู้ทำคนที่ 1</label>
                                                            <input type="hidden" value="{{ $pro->project_id }}"
                                                                name="id">
                                                            <input type="text" name="author" class="form-control"
                                                                value="{{ $pro->author }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="co_author">ชื่อผู้ทำคนที่ 2</label>
                                                            <input type="text" name="co_author" class="form-control"
                                                                value="{{ $pro->co_author }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="title_th">ชื่อโครงงาน (ไทย)</label>
                                                            <input type="text" name="title_th" class="form-control"
                                                                value="{{ $pro->title_th }}">
                                                        </div>

                                                    </div>    
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" href="{{ route('allproject')}}">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                            
                            

                                            <a href="/deletepro/{{ $pro->project_id }}">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="delcate({{ $pro->project_id }})"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </a>
                                            <a href="/addfile/{{ $pro->project_id }}">
                                                <button type="button" class="btn btn-warning"><i
                                                        class="fa-solid fa-plus"></i><i
                                                        class="fa-solid fa-file"></i></button>
                                            </a>
                                            <a href="/allfile/{{ $pro->project_id }}">
                                                <button type="button" class="btn btn-warning"><i
                                                        class="fa-solid fa-file"></i></button>
                                            </a>

                            </th>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
@endsection
