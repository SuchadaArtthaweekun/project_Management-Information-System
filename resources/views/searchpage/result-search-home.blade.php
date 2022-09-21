@extends('layouts.fordashboard')

@section('content')
    <p>home</p>
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
           {{-- @foreach ($data as $uhuh)
            <div class="col">
                {{ $uhuh->title_th }}
                {{ $uhuh->edition }}
                {{ $uhuh->cate_id }}
                {{ $uhuh->catename }}
            </div> --}}
            {{-- @endforeach --}}
        </div>
    </div>


   
@endsection
