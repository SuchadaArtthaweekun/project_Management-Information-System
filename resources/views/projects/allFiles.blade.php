@extends('layouts.fordashboard')

@section('content')

    <body>
        <h1>All files!</h1>
       
        <table class="table">
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>path</th>
                <th>type</th>
                <th>project</th>
                <th>direc</th>
                <th>View</th>
                <th>Download</th>
                <th>action</th>
            </tr>
            {{-- @foreach ($files as $key => $file) --}}
            @foreach ($files as $key => $file)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $file->docname }}</td>
                    <td>{{ $file->doc_path }}</td>
                    <td>{{ $file->doc_type }}</td>

                    <td>id :{{ $file->project_id }} title : {{ $file->title_th }} </td>

                    <td><a href="{{ $file->doc_path }}">path</a></td>
                    <td><a href="/documents/{{ $file->docname }}">View</a></td>
                    <td><a href="/file/download/{{ $file->file }}">Download</a></td>
                    <td> <a href="/deletedoc/{{ $file->doc_id }}">
                            <button type="button" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i></button>
                        </a>
                    </td>
                    <td>
                        {{-- add file --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_file_{{ $file->project_id }}">
                            Add file
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal_file_{{ $file->project_id }}" tabindex="-1"
                            aria-labelledby="modal_file_{{ $file->project_id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add file</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    {{-- <form method="get" action="{{ route('addproject') }}"> --}}
                                    <form method="post" action="{{ route('storeAgain') }}" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="col-md-12">
                
                                                @csrf
                                                <div>
                                                    
                                                    <input type="text" name="project_id" placeholder="Choose file" id="project_id" value="{{ $file->project_id }}">
                                                    <p>id :  {{ $file->project_id }}</p>
                                                    <p>name :  {{ $file->title_th }}</p>
                                                    <p>ของ :  {{ $file->title_th }}</p>
                                                  
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" name="file[]" placeholder="Choose file" id="file" multiple="multiple">
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
                
                                              
                                                
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" href="{{ route('allFiles') }}">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
       
 
                    </td>

                </tr>
            @endforeach
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
        </script>

    </body>
@endsection
