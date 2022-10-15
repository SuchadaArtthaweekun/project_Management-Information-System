@extends('layouts.tch-dashboard')

@section('content')

    <body>
        <div class="container">
            <div class="row">
                @if (Session::get('status'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>อัปโหลดเสร็จสิ้นแล้ว</strong>
                    </div>
                @endif

                <div class="col-12">
                    <div class="showDoc">
                        <h2 style="text-align: center">เอกสารโครงงานนักศึกษา</h2>

                        <div>
                            <h3>{{ $project[0]->title_th }}</h3>
                            <h4>{{ $project[0]->title_en }}</h4>
                            <h5>ผู้จัดทำ : {{ $project[0]->author }} {{ $project[0]->co_author }}</h5>
                            <h5>ที่ปรึกษา :
                                <?php if ($project[0]->adviser == $project[0]->adviser_id) {
                                    echo $project[0]->adviser_fullname_th;
                                } ?>
                                <?php if ($project[0]->co_adviser == $project[0]->adviser_id) {
                                    echo $project[0]->adviser_fullname_th;
                                } ?>
                            </li>
                            <div class="doc_upload">
                                <p>อัปโหลดไฟล์</p>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#modal_file_{{ $project[0]->project_id }}">
                                    <i class="fa-light fa-plus"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="modal_file_{{ $project[0]->project_id }}" tabindex="-1"
                                    aria-labelledby="modal_file_{{ $project[0]->project_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add file</h5>
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

                                                            <input type="text" name="project_id"
                                                                placeholder="Choose file" id="project_id"
                                                                value="{{ $project[0]->project_id }}">

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
                                                            <select class="form-control" id="exampleFormControlSelect1"
                                                                name="type" placeholder="">
                                                                <option value="โครงงาน">โครงงาน</option>
                                                                <option value="แบบเสนอ">แบบเสนอ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        href="{{ route('allproject') }}">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <table class="table">
                            <tr>
                                <th>No.</th>
                                <th>document</th>
                                <th>type</th>
                                {{-- <th>project</th> --}}
                                <th>View</th>
                                <th>Download</th>
                                {{-- <th>action</th> --}}
                            </tr>
                            {{-- @foreach ($files as $key => $file) --}}
                            @foreach ($project as $key => $file)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $file->docname }}</td>
                                    <td>{{ $file->doc_type }}</td>

                                    {{-- <td>id :{{ $file->project_id }} title : {{ $file->title_th }} </td> --}}

                                    <td><a href="/documents/{{ $file->docname }}">View</a></td>
                                    <td><a href="/file/download/{{ $file->docname }}" target="_blank">Download</a></td>
                                    <td>



                                        <button type="button" class="btn btn-danger" onclick="del({{ $file->doc_id }})">
                                            <i class="fa-solid fa-trash"></i></button>

                                    </td>
                                    <td>

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
                    title: 'Are you sure? ' + id,
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`http://127.0.0.1:8000/deletedoc/${id}`).then((respons) => {
                            console.log(respons)
                        })
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        ).then(() => {
                            location.reload();
                        })
                    }
                })
            }
        </script>
    </body>
@endsection
