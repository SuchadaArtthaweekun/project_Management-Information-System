@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="showDoc">
                        <h2 style="text-align: center">เอกสารโครงงานนักศึกษา</h2>

                        <div>
                            <h4 class="titleallfile">{{ $project->title_th }}</h4>
                            <h4 class="titleallfile">{{ $project->title_en }}</h4>
                            <h5>ผู้จัดทำ : {{ $project->author }} {{ $project->co_author }}</h5>
                            <h5>ที่ปรึกษา :
                                @if ($project->advisers && count($project->advisers) > 0)
                                    {{ $project->advisers->first()->adviser_fullname_th }}
                                @else
                                    {{ '-' }}
                                @endif
                            </h5>
                            <h5>ที่ปรึกษาร่วม :
                                @if ($project->co_advisers && count($project->co_advisers) > 0)
                                    {{ $project->co_advisers->first()->adviser_fullname_th }}
                                @else
                                    {{ '-' }}
                                @endif
                            </h5>
                            {{-- <h5>หมวดหมู่โครงงาน : 
                                @if( $project->cate_id ==  $projects->cate_id ){
                                    {{ $projects->catename }}
                                }
                                @endif --}}
                            </h5>
                            </li>
                            <div class="doc_upload">
                                <p>อัปโหลดไฟล์</p>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modal_file_{{ $project->project_id }}">
                                    <i class="fa-light fa-plus"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal_file_{{ $project->project_id }}" tabindex="-1"
                                    aria-labelledby="modal_file_{{ $project->project_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มไฟล์เอกสาร</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            {{-- <form method="get" action="{{ route('addproject') }}"> --}}
                                            <form method="post" action="{{ route('upFileDoc') }}"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="col-md-12">

                                                        @csrf
                                                        <div>

                                                            <input type="hidden" name="project_id"
                                                                placeholder="Choose file" id="project_id"
                                                                value="{{ $project->project_id }}">

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="file" name="file[]"
                                                                    placeholder="Choose file" id="file"
                                                                    multiple="multiple">
                                                                @error('file')
                                                                    <div class="alert alert-danger mt-1 mb-1">
                                                                        {{ $message }}
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
                                                    <button type="submit" class="btn btn-primary" onclick="conf()"
                                                        href="{{ route('allproject') }}">บันทึก</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <table class="table">
                            <tr>
                                <th>อันดับ</th>
                                <th>ชื่อเอกสาร</th>
                                <th>ประเเภทไฟล์</th>
                                {{-- <th>project</th> --}}
                                <th>ดู</th>
                                <th>ดาวน์โหลด</th>
                                <th>ลบ</th>
                            </tr>
                            @foreach ($project->documents as $key => $file)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $file->docname }}</td>
                                    <td>{{ $file->doc_type }}</td>

                                    {{-- <td>id :{{ $file->project_id }} title : {{ $file->title_th }} </td> --}}

                                    <td class="view"><a href="/documents/{{ $file->docname }}">
                                            <i class="fa-solid fa-eye"></i></a></td>
                                    <td class="download"><a href="/file/download/{{ $file->docname }}" target="_blank">
                                            <div class="download">
                                                <i class="fas fa-file-download"></i>
                                            </div>
                                        </a></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="del({{ $file->doc_id }})">
                                            <i class="fa-solid fa-trash"></i></button>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>



            </div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
        </script>
        <script>
            const del = (id) => {
                Swal.fire({
                    title: 'ต้องการลบไฟล์ ' + name,
                    text: "คุณจะไม่สามารถย้อนกลับได้!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`http://127.0.0.1:8000/deletedoc/${id}`).then((respons) => {
                            console.log(respons)
                        })
                        Swal.fire(
                            'ลบสำเร็จ',
                            'ไฟล์นี้ถูกลบแล้ว',
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
        </script>
    </body>
@endsection
