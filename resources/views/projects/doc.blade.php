@extends('layouts.web')

@section('content')
    <form action="">
        <body>
            <h1>The files!</h1>
    <div class="col-8">
        <table class="table">
            <tr>
                <th>No.</th>
                <th>project id</th>
                <th>name</th>
                <th>document</th>
                <th>type</th>
                <th>project</th>
                <th>direc</th>
                <th>View</th>
                <th>Download</th>
                <th>action</th>
            </tr>
            {{-- @foreach ($files as $key => $file) --}}
            @foreach ($project as $key => $file)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $file->project_id }}</td>
                    <td>{{ $file->title_th }}</td>
                    <td>{{ $file->docname }}</td>
                    <td>{{ $file->doc_type }}</td>

                    <td>id :{{ $file->project_id }} title : {{ $file->title_th }} </td>

                    <td><a href="{{ $file->doc_path }}">path</a></td>
                    <td><a href="/documents/{{ $file->docname }}">View</a></td>
                    <td><a href="\{{ $file->doc_path }}">Download</a></td>
                    <td><a href="URI">uri</a></td>
                    

                </tr>
            @endforeach
        </table>

    </div>
            
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
            </script>
    
        </body>
    </form>
@endsection