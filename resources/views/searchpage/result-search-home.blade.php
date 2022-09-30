@extends('layouts.web')

@section('menu')
@endsection

@section('content')
    <div class="item">
        <div class="container">
            {{-- <div class="row"> --}}
                <div class="row">
                    <div class="col-4">
                        <div class="sidebarhome">

                            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
                                <a href="/"
                                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                                    <svg class="bi me-2" width="40" height="32">
                                        <use xlink:href="#bootstrap"></use>
                                    </svg>
                                    <span class="fs-4">โปรเจคที่น่าสนใจ</span>
                                </a>
                                <hr>
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('oldProject')}}" class="nav-link link-dark" aria-current="page">
                                            <svg class="bi me-2" width="16" height="16">
                                                <use xlink:href="#home"></use>
                                            </svg>
                                            โปรเจคเก่ากว่า
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('newProject')}}" class="nav-link link-dark">
                                            <svg class="bi me-2" width="16" height="16">
                                                <use xlink:href=""></use>
                                            </svg>
                                            โปรเจคใหม่กว่า
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cate1Project')}}" class="nav-link link-dark">
                                            <svg class="bi me-2" width="16" height="16">
                                                <use xlink:href="#table"></use>
                                            </svg>
                                            โปรเจคเว็บไซต์
                                        </a>
                                    </li>
                                   <ul class="nav nav-pills flex-column mb-auto">
                                    <li>
                                        @foreach ($data as $item)
                                            <a href="searchcate/{{$item->cate_id}}" class="nav-link link-dark">
                                                <svg class="bi me-2" width="16" height="16">
                                                    <use xlink:href="#grid"></use>
                                                </svg>
                                              {{ $item->catename}}
                                        </a>
                                        @endforeach
                                        
                                    </li>
                                </ul>
                                </ul>
                                <hr>
                                
                            </div>

                        </div>
                    </div>
                    <div class="col-8">
                        @foreach ($data as $uhuh)

                                <div class="result">
                                    <div class="gard">
                                            <a href="/Document/{{ $uhuh->project_id }}">
                                                <h3>{{ $uhuh->title_th }}</h3>
                                                <p>หมวดหมู่ : {{ $uhuh->catename }}</p>
                                                <p>จัดทำโดย : {{ $uhuh->author }} {{ $uhuh->co_author }}</p>
                                                <p>ที่ปรึกษา : {{ $uhuh->adviser_fullname_th }} {{ $uhuh->co_adviser }}</p>
                                                <p class="abtract">บทคัดย่อ : {{ $uhuh->abtract }}</p>
                                                <div class="content.date">
                                                    <p>เผยแพร่เมื่อ {{ $uhuh->edition }}</p>
                                                </div>
                                            </a>
                                    </div>
                                </div>
                            
                        @endforeach

                        
                        <div class="pagination">
                           {{ $data->links() }}
                          </div>

                         
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection
