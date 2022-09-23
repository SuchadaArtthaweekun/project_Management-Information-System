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

            <div class="result" >
                <div class="gard">
                    <div>
                        <h3>{{ $uhuh->title_th }}</h3>
                        <h5>{{ $uhuh->cate_id }} </h5>
                        {{-- <h5>{{ $uhuh->catename }} </h5> --}}
                        <p>{{ $uhuh->abtract }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div>
      
    </div>


   
@endsection
