@extends('layouts.fordashboard')

@section('content')

<form action="">
    <div class="showdatafile">
        @foreach ($projects as $pro ) 
        <h3>{{ $pro->project_id }}</h3>
        <h3>{{ $pro->title_th }}</h3>
        <h3>{{ $pro->title_en }}</h3>
        <li>ชื่อผู้ทำคนที่ : {{ $pro->author }} {{ $pro->co_author }}</li>
        @endforeach


        @foreach ($documents as $doc)
        <ul>
            
            
            <li>เอกสาร : {{ $doc->docname }} <br> {{ $doc->doc_path }}</li>
            <a href="/files/{{ $doc->docname }}">Open the name pdf! {{ $doc->docname }}</a><br>
            <a href="{{ $doc->docname }}">Open the name pdf!</a><br>
            <a href="{{ $doc->doc_path }}">Open the path pdf!</a><br>
            <a href="{{ asset('files/CI.01 แบบเสนอโครงงานนักศึกษาการพัฒนาระบบสารสนเทศเพื่อจัดการโครงงานนักศึกษา.pdf') }}">Open the pdf!</a>
        </ul>
        
        
        @endforeach
        
        <p>ชื่อผู้ทำคนที่ : {{ $pro->author }} {{ $pro->co_author }}</p>
        <h5>ชื่อผู้ทำคนที่ 1</h5> <h5>{{ $pro->author }}</h5>
        <h5>ชื่อผู้ทำคนที่ 2</h5> <h5>{{ $pro->co_author }}</h5>
    </div>
</form>



@endsection