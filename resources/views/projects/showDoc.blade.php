@extends('layouts.web')

@section('content')
    {{-- {{$project}} --}}
    <section class="showdoc">
        {{-- {{$project}} --}}



    </section>
    

    <body>
        <div class="container">
           
                    <div class="showDoc">
                        <h2 style="text-align: center">เอกสารโครงงานนักศึกษา</h2>
                        <h5>{{ $project->view_counter }}</h5>
                        @foreach ($project as $key => $file)
                            <div>
                                <h3>{{ $file->title_th }}</h3>
                                <h4>{{ $file->title_en }}</h4>
                                <h5>ผู้จัดทำ : {{ $file->author }} {{ $file->co_author }}</h5>

                            </div>
                        @endforeach

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
                                    <td><a href="file/download/{{ $file->docname }}">Download</a></td>
                                    <td><a href="/file/download/{{$file->docname}}" target="_blank">Download</a></td>
                                    <td> 
                                            <button type="button" class="btn btn-danger"  onclick="del({{ $file->doc_id }})">
                                                <i class="fa-solid fa-trash">ลบ</i></button>
                                       
                                    </td>

                                </tr>
                            @endforeach
                        </table>
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
