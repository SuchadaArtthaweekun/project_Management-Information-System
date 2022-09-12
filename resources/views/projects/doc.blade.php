@extends('layouts.fordashboard')

@section('content')
    <form action="">
        @foreach ($file as $item)
            <div class="showdatafile">

                <h3>{{ $item->project_id }}</h3>
                <h3>{{ $item->title_th }}</h3>
                <h3>{{ $item->title_en }}</h3>
                <li>ชื่อผู้ทำคนที่ : {{ $item->author }} {{ $item->co_author }}</li>




                <ul>
                    <li>เอกสาร : {{ $item->docname }} <br> {{ $item->doc_path }}</li>
                    <a href="/files/{{ $item->docname }}">Open the name pdf! {{ $item->docname }}</a><br>
                    <a href="/documents/{{ $item->title_th }}">Open the name pdf! {{ $item->title_th }}</a><br>
                    
                </ul>



            </div>
        @endforeach

    </form>
@endsection
