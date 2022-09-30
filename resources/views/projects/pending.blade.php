@extends('layouts.fordashboard')

@section('content')
    <div class="container">
        <div>
            <h5>โครงงานนักศึกษารอการอนุมัติ</h5>
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
                    @foreach ($data as $pro)
                        <td>{{ $pro->project_id }}</td>
                        <td>{{ $pro->title_th }}</td>
                        <td>{{ $pro->edition }}</td>
                        <td>{{ $pro->author }} {{ $pro->co_author }}</td>
                        <td>{{ $pro->adviser_fullname_th }}</td>
                        <td>{{ $pro->catename }}</td>
                        <td>
                            <a href="">
                                <button class="btn btn-success">
                                    เผยแพร่
                                </button>
                            </a>
                            <a href="">
                                <button class="btn btn-primary">
                                    ดู
                                </button>
                            </a>
                            <a href="">
                                <button class="btn btn-danger">
                                    ลบ
                                </button>
                            </a>
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
@endsection
