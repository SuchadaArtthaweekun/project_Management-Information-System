@extends('layouts.fordashboard')

@section('content')
    <p>hello</p>
    <div class="container">
        {{-- <div class="item">
            {{ $lists }}
           @foreach ($lists as $item)
            <div class="col">
                {{ $item->title_th }}
            </div>
            @endforeach
        </div> --}}

        <div class="item">
            {{ $data }}
           @foreach ($data as $uhuh)
            <div class="col">
                {{ $uhuh->title_th }}
                {{ $uhuh->edition }}
                {{ $uhuh->cate_id }}
                {{ $uhuh->adviser }}
                {{ $uhuh->co_adviser }}
            </div>
            @endforeach
        </div>
    </div>


   
@endsection
