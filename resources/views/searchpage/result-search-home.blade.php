@extends('layouts.web')

@section('menu')
@endsection

@section('content')
    <div class="item">
        <div class="container">
            <div class="notfound">
                <?php
                if ($data->count() == 0) {
                    echo 'ไม่พบข้อมูล';
                    "<h5>ไม่พบข้อมูล</h5>";
                }
                ?>
            </div>
            
            @foreach ($data as $da)
                <div class="result">

                    <div class="gard">
                        <a href="/Document/{{ $da->project_id }}">
                            <h5>{{ $da->title_th }}</h5>

                            <p>หมวดหมู่ : {{ $da->catename }}</p>

                            <p>จัดทำโดย : {{ $da->author }} {{ $da->co_author }}</p>
                            <p>
                                ที่ปรึกษา :
                                <?php if ($da->adviser == $da->adviser_id) {
                                    echo $da->adviser_fullname_th;
                                } ?>
                                <?php if ($da->co_adviser == $da->adviser_id) {
                                    echo $da->adviser_fullname_th;
                                } ?>
                            </p>

                            <p class="abtract">บทคัดย่อ : {{ $da->abtract }}</p>
                            <div class="content.date">
                                <p>เผยแพร่เมื่อ {{ $da->edition }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- @foreach ($data as $uhuh)
                <div class="result">
                    <div class="gard">
                        <a href="/Document/{{ $uhuh->project_id }}">
                            <h3>{{ $uhuh->title_th }}</h3>
                            <p>หมวดหมู่ : {{ $uhuh->catename }}</p>
                            <p>จัดทำโดย : {{ $uhuh->author }} {{ $uhuh->co_author }}</p>
                            <p>
                                ที่ปรึกษา :
                                <?php if ($uhuh->adviser == $uhuh->adviser_id) {
                                    echo $uhuh->adviser_fullname_th;
                                } ?>
                                <?php if ($uhuh->co_adviser == $uhuh->adviser_id) {
                                    echo $uhuh->adviser_fullname_th;
                                } ?>
                            </p>

                            <p class="abtract">บทคัดย่อ : {{ $uhuh->abtract }}</p>
                            <div class="content.date">
                                <p>เผยแพร่เมื่อ {{ $uhuh->edition }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach --}}


            <div class="pagination">
                {{ $data->links('pagination::simple-bootstrap-4') }}
                {{-- {{ $data->onEachSide(5)->links() }} --}}
                {{-- {{ $data->links() }} --}}
                {{-- @if (isset($query))
                    {{ $data->appends($query)->links() }}
                @else
                    {{ $data->links() }}
                @endif --}}
            </div>

        </div>
    </div>
    </div>
@endsection
