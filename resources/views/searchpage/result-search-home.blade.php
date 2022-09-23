@extends('layouts.web')

@section('menu')
@endsection

@section('content')
    <div class="container">
        <div class="item">

            @foreach ($data as $uhuh)
                <div class="col-4">

                </div>
                <div class="col-8">
                    <div class="result">
                        <div class="gard">
                            <div>
                                <a href="/Document/{{ $uhuh->project_id }}">
                                    <h3>{{ $uhuh->title_th }}</h3>
                                    <h5>{{ $uhuh->cate_id }} </h5>
                                    {{-- <h5>{{ $uhuh->catename }} </h5> --}}
                                    <p>{{ $uhuh->abtract }}</p>
                                    <div class="content.date">
                                        <p>อัปโหลดเมื่อ {{ $uhuh->updated_at }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
