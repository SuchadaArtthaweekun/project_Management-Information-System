@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div>
            <h5>โครงงานนักศึกษารอการอนุมัติ</h5>
        </div>
        <div>
            @if (Session::get('info'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>ดำเนินการสมัครเสร็จสิ้นแล้ว รอการอนุมัติ</strong>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
        <div>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>edition</th>
                    <th>author</th>
                    <th>adviser</th>
                    <th>cate id</th>
                    <th>Action</th>
                </tr>
                <tr>
                    @if (is_array($data) || is_object($data))
                        
                        @foreach ($data as $pro)
                            <td>{{ $pro->project_id }}</td>
                            <td>{{ $pro->title_th }}</td>
                            <td>{{ $pro->edition }}</td>
                            <td>{{ $pro->author }} {{ $pro->co_author }}</td>
                            <td>{{ $pro->adviser_fullname_th }}</td>
                            <td>{{ $pro->catename }}</td>
                            <td>
                                <a href="{{ route('publishProject') }}">
                                    <button class="btn btn-success">
                                        เผยแพร่
                                    </button>
                                </a>
                                <a href="">
                                    <button class="btn btn-primary">
                                        ดู
                                    </button>
                                </a>
                                <a href="/deletepro/{{ $pro->project_id }}">
                                    <button class="btn btn-danger">
                                        ลบ
                                    </button>
                                </a>
                            </td>
                        @endforeach
                    @endif
                </tr>
            </table>
        </div>
    </div>
@endsection
