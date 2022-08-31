@extends('layouts.fordashboard')

@section('content')

    <body>
        <div class="table-responsive">
            <div>
                {{-- add users --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal_addAdviser">
                    Add Adviser
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modal_addAdviser" tabindex="-1"
                    aria-labelledby="modal_addAdviser" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Adviser</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="get" action="{{ route('addAdviser') }}">
                                <div class="modal-body">
                                    <div class="col-md-12">

                                        @csrf
                                        <div class="form-group">
                                            <label for="name_prefix_th">คำนำหน้า (ไทย)</label>
                                            <input type="hidden"  name="adviser_id">
                                            <input type="text" name="name_prefix_th" class="form-control"
                                                placeholder="คำนำหน้า" >
                                        </div>

                                        <div class="form-group">
                                            <label for="name_prefix_eng">คำนำหน้า (อังกฤษ)</label>
                                            <input type="text" name="name_prefix_eng" class="form-control"
                                                placeholder="คำนำหน้า (อังกฤษ)">
                                        </div>

                                        <div class="form-group">
                                            <label for="adviser_fullname_th">ชื่อ-สกุล (ไทย)</label>
                                            <input type="text" name="adviser_fullname_th" class="form-control"
                                                placeholder="ชื่อ-สกุล (ไทย)">
                                        </div>

                                        <div class="form-group">
                                            <label for="adviser_fullname_en">ชื่อ-สกุล (อังกฤษ)</label>
                                            <input type="text" name="adviser_fullname_en" class="form-control"
                                                placeholder="ชื่อ-สกุล (อังกฤษ)">
                                        </div>

                                        <div class="form-group">
                                            <label for="adviser_tel">เบอร์โทร</label>
                                            <input type="text" name="adviser_tel" class="form-control"
                                                placeholder="เบอร์โทร">
                                        </div>

                                        <div class="form-group">
                                            <label for="adviser_email">อีเมล</label>
                                            <input type="text" name="adviser_email" class="form-control"
                                                placeholder="อีเมล">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" href="{{ route('alladviser') }}">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>
            {{-- show user --}}
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr>
                        <th><strong>No</strong></th>
                        <th><strong>ชื่อ-สกุล (ไทย)</strong></th>
                        <th><strong>ชื่อ-สกุล (อังกฤษ)</strong></th>
                        <th><strong>เบอร์โทร</strong></th>
                        <th><strong>อีเมล</strong></th>
                        <th><strong>โครงาน</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($advisers as $ads)
                        <tr>
                            <th>{{ $ads->adviser_id }}</th>
                            <th>{{ $ads->name_prefix_th }} {{ $ads->adviser_fullname_th }}</th>
                            <th>{{ $ads->name_prefix_eng }} {{ $ads->adviser_fullname_en }}</th>
                            <th>{{ $ads->adviser_tel }}</th>
                            <th>{{ $ads->adviser_email }}</th>
                            <th>{{ $ads->project_id }}</th>
                            <th>
                        
                               
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_{{ $ads->adviser_id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal_{{ $ads->adviser_id }}" tabindex="-1"
                                    aria-labelledby="modal_{{ $ads->adviser_id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">edit adviser</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="{{ route('updateadviser') }}">
                                                <div class="modal-body">
                                                    <div class="col-md-12">

                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="title">คำนำหน้า (ไทย)</label>
                                                            <input type="hidden" value="{{ $ads->adviser_id }}"
                                                                name="adviser_id">
                                                            <input type="text" name="name_prefix_th" class="form-control"
                                                                value="{{ $ads->name_prefix_th }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name_prefix_eng">คำนำหน้า (อังกฤษ)</label>
                                                            <input type="text" name="name_prefix_eng" class="form-control"
                                                                value="{{ $ads->name_prefix_eng }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="adviser_fullname_th">ชื่อ-สกุล (ไทย)</label>
                                                            <input type="text" name="adviser_fullname_th" class="form-control"
                                                                value="{{ $ads->adviser_fullname_th }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="adviser_fullname_en">ชื่อ-สกุล (อังกฤษ)</label>
                                                            <input type="text" name="adviser_fullname_en" class="form-control"
                                                                value="{{ $ads->adviser_fullname_en }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="adviser_tel">เบอร์โทร</label>
                                                            <input type="text" name="adviser_tel" class="form-control"
                                                                value="{{ $ads->adviser_tel }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="adviser_email">อีเมล</label>
                                                            <input type="text" name="adviser_email" class="form-control"
                                                                value="{{ $ads->adviser_email }}">
                                                        </div>

                                                    
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        href="{{ route('alladviser') }}">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                                <a href="/deleteadviser/{{ $ads->adviser_id }}">
                                    <button type="button" class="btn btn-danger" href=" {{ route('alladviser')}} "><i class="fa-solid fa-trash"></i></button>
                                </a>
                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </body>

    
@endsection
