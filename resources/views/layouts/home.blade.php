<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT Projects</title>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/css.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top">
        <div class="container">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('/img/LogoHead-1.png') }}"></a>
            </div>

            {{-- <a class="navbar-brand" href="#">ITBRU Projects</a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="" id="navbarResponsive">
                <ul class="">
                    @if (Route::has('login'))
                        <div class="navhome">
                            @auth
                            <a href="{{ route('eachDash') }}" class="nav-home">แผงควบคุม</a>
                            
                            @else
                                <a href="{{ route('login') }}" class="nav-home">เข้าสู่ระบบ</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="nav-home">สมัครสมาชิก</a>
                                @endif
                            @endauth
                        </div>
                    @endif

            </div>
        </div>
    </nav>

    <header>
        <div class="">

        </div>
    </header>

    <div class="container-fluid">
        @yield('content')
        @yield('menu')


    </div>

    {{-- <footer>
        <div class="container-fluid">
            <div class="footer-dark">
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 item">
                                <div class="foot">
                                    <h3>ประเภทโครงงานนักศึกษา</h3>
                                    <ul>
                                        <li>
                                            @foreach ($catebar as $item)
                                                <a href="\searchcate/{{ $item->cate_id }}" class="nav-link link-light">
                                                    <svg class="bi me-2" width="16" height="16">
                                                        <use xlink:href="#grid"></use>
                                                    </svg>
                                                    {{ $item->catename }}
                                                </a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3 item">
                                <div class="foot">
                                    <h3>ติดต่อเรา</h3>
                                    <ul>
                                        <li><a href="https://web.facebook.com/IT.BRU?_rdc=1&_rdr">Facebook</a></li>
                                        <li><a href="https://web.facebook.com/it.bru.ac.th">Facebook</a></li>
                                        <li><a href="https://it.bru.ac.th/">website</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 item text">
                                <div class="foot">
                                    <h3>สาขาเทคโนโลยีสารสนเทศ</h3>
                                    <p>เทคโนโลยี​สาร​สนเทศ​เป็น​สาขา​วิชา​ที่​มี​ความ​ทัน​สมัย​
                                        ผู้​เรียน​จะ​มี​ความ​สามารถ​ทั้ง​ด้าน​เทคโนโลยี​และ​การ​จัดการ​ด้าน​ธุรกิจ​ผสม​ผสาน​วิทยาการ​ที่​ก้าวหน้า​ด้าน​เทคโนโลยี​สาร​สนเทศ​ให้​เกิด​ประโยชน์​สูงสุด​ต่อ​การ​บริหาร​งาน​ของ​องค์กร
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        </div>
    </footer> --}}

    <footer>
        <div class="fthome">
            <div class="container-fluid">
                <div class="row ftrow">
                    <div class="col ftcol">
                        <h4>ติดต่อเรา</h4>
                        <div class="social">
                            <a href="https://web.facebook.com/it.bru.ac.th" ><img src="{{ asset('/img/facebook.png') }}" alt="" class="imgsocial" ></a>
                            <a href="https://www.facebook.com/IT.BRU" ><img src="{{ asset('/img/facebook-2.png') }}" alt="" class="imgsocial" ></a>
                            <a href="https://www.youtube.com/HelloBENZ" ><img src="{{ asset('/img/youtube.png') }}" alt="" class="imgsocial" ></a>
                            <a href="https://it.bru.ac.th/" ><img src="{{ asset('/img/browser.png') }}" alt="" class="imgsocial" ></a>
                        </div>

                    </div>
                    <div class="col ftcol">

                    </div>
                    <div class="col ftcol">
                        <h3>สาขาเทคโนโลยีสารสนเทศ</h3>
                        <p>เทคโนโลยี​สาร​สนเทศ​เป็น​สาขา​วิชา​ที่​มี​ความ​ทัน​สมัย​
                            ผู้​เรียน​จะ​มี​ความ​สามารถ​ทั้ง​ด้าน​เทคโนโลยี​และ​การ​จัดการ​ด้าน​ธุรกิจ​ผสม​ผสาน​วิทยาการ​ที่​ก้าวหน้า​ด้าน​เทคโนโลยี​สาร​สนเทศ​ให้​เกิด​ประโยชน์​สูงสุด​ต่อ​การ​บริหาร​งาน​ของ​องค์กร
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
