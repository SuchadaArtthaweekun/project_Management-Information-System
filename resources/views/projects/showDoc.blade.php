@extends('layouts.web')

@section('content')
    {{-- {{$project}} --}}
    <section class="showdoc">
        {{-- {{$project}} --}}



    </section>
    {{ $projects = Projects::first();
    
    visits($projects)->period('day')->count();
    visits($projects)->period('week')->count();
    visits($projects)->period('month')->count();
    visits($projects)->countries();
    visits($projects)->refs();
    visits($projects)->operatingSystems();
    visits($projects)->languages() }}

    <body>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="sidebarhome">

                        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
                            <a href="/"
                                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                                <svg class="bi me-2" width="40" height="32">
                                    <use xlink:href="#bootstrap"></use>
                                </svg>
                                <span class="fs-4">โปรเจคที่น่าสนใจ</span>
                            </a>
                            <hr>
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li class="nav-item">
                                    <a href="{{ route('oldProject') }}" class="nav-link link-dark" aria-current="page">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#home"></use>
                                        </svg>
                                        โปรเจคเก่ากว่า
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('newProject') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href=""></use>
                                        </svg>
                                        โปรเจคใหม่กว่า
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('cate1Project') }}" class="nav-link link-dark">
                                        <svg class="bi me-2" width="16" height="16">
                                            <use xlink:href="#table"></use>
                                        </svg>
                                        โปรเจคเว็บไซต์
                                    </a>
                                </li>
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li>
                                        @foreach ($categories as $item)
                                            <a href="searchcate/{{ $item->cate_id }}" class="nav-link link-dark">
                                                <svg class="bi me-2" width="16" height="16">
                                                    <use xlink:href="#grid"></use>
                                                </svg>
                                                {{ $item->catename }}
                                            </a>
                                        @endforeach

                                    </li>
                                </ul>
                            </ul>
                            <hr>

                        </div>

                    </div>
                </div>

                <div class="col-8">
                    <div class="showDoc">
                        <h2 style="text-align: center">เอกสารโครงงานนักศึกษา</h2>
                        <h5>{{$project->view_counter}}</h5>
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
                                    <td> <a href="/deletedoc/{{ $file->doc_id }}">
                                            <button type="button" class="btn btn-danger">
                                                <i class="fa-solid fa-trash">ลบ</i></button>
                                        </a>
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

    </body>
@endsection
