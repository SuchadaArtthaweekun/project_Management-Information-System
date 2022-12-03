@extends('layouts.searched')
@section('menu')
@endsection

@section('content')
    <div class="item">
        @if ( Session::get('info'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>ดำเนินการสมัครเสร็จสิ้นแล้ว รอการอนุมัติ</strong>
        </div>
    @endif
        <div class="container">
            <div class="countresult">
                <p>ผลการค้นหา {{ $data->count() }}</p>
            </div>

            @if ($data == Null)
                <p>null</p>
            @endif
                        @foreach ($data as $uhuh)
                                <div class="result">
                                    <div class="gard">
                                            <a href="/Document/{{ $uhuh->project_id }}">
                                                <h3>{{ $uhuh->title_th }}</h3>
                                                <p>หมวดหมู่ : {{ $uhuh->catename }}</p>
                                                <p>จัดทำโดย : {{ $uhuh->author }} {{ $uhuh->co_author }}</p>
                                                
                                                <p>

                                                    ที่ปรึกษา :
                                                    @foreach ($adviser as $adv)
                                                        <?php if ($uhuh->adviser == $adv->adviser_id) {
                                                        echo $adv->adviser_fullname_th;
                                                    } ?>
                                                    <?php if ($uhuh->co_adviser == $adv->adviser_id) {
                                                        echo $adv->adviser_fullname_th;
                                                    } ?>
                                                    @endforeach
                                                    
                                                </p>
                                                <p class="abtract">บทคัดย่อ : {{ $uhuh->abtract }}</p>
                                                <div class="content.date">
                                                    <p>เผยแพร่เมื่อ {{ $uhuh->edition }}</p>
                                                </div>
                                            </a>
                                    </div>
                                </div>
                            
                        @endforeach

                        
                        <div class="pagination">
                           {{ $data->links('pagination::simple-bootstrap-4') }}
                          </div>
        </div>
    </div>
@endsection
