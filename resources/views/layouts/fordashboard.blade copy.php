
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/app.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
    <head>
        <div class="container-fluid">
            <div clas="row">
                <div class="headername">
                    <div class="col-9">
                        <img src="{{ asset('/img/LogoHead-1.png') }}" class="LogoHead">
                    </div>
                    <div class="col-2">
                        <div class="headname">
                            
                                <div class="u_name">{{ Auth::user()->name }}</div>
                                <div class="u_email">{{ Auth::user()->email }}</div>
                            
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="haedlohout">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </head>

    {{-- sidebar --}}
    <div class="container lg">
        <div class="row">
            <div class="contentnav">
                <div clas="col-6">
                    <!-- Component Start -->
                    <div class="app">
                        <div id="sidenav">
                          <div class="wrapper">
                            <div class="logo">
                              <a href="#">Dashboard</a>
                              <a href="#" class="nav-icon pull-right"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="menu">
                              <ul>
                                <li class="active"><a href="#">Home</a></li>
                                <!-- If login as admin -->
                                <li>
                                  <a href="#">My Account</a>
                                    <ul>
                                      <li><a href="#">Posts</a></li>
                                      <li><a href="#">Categories</a></li>
                                      <li><a href="#">Create New Post</a></li>
                                      <li><a href="#">FAQ</a></li>
                                    </ul>
                                </li>
                                <!-- End If login as admin -->
                                <li><a href="#">About Us</a></li>
                                <li>
                                  <a href="#">Category</a>
                                    <ul>
                                      <li><a href="{{ url('insertCate')}}">add new Category</a></li>
                                      <li><a href="#">All category</a></li>
                                      <li><a href="#">Galleries</a></li>
                                      <li><a href="#">Videos</a></li>
                                      <li><a href="#">Links</a></li>
                                    </ul>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!-- Component End  -->
                </div>
                
                <div class="col-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-fluid">
            <div class="footer-dark">
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 item">
                                <h3>ประเภทโครงงานนักศึกษา</h3>
                                <ul>
                                    <li><a href="#">โปรแกรม</a></li>
                                    <li><a href="#">เว็บไซต์</a></li>
                                    <li><a href="#">อินเทอร์เน็ตสรพพสิ่ง</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-md-3 item">
                                <h3>About</h3>
                                <ul>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Careers</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 item text">
                                <h3>สาขาเทคโนโลยีสารสนเทศ</h3>
                                <p>เทคโนโลยี​สาร​สนเทศ​เป็น​สาขา​วิชา​ที่​มี​ความ​ทัน​สมัย​ ผู้​เรียน​จะ​มี​ความ​สามารถ​ทั้ง​ด้าน​เทคโนโลยี​และ​การ​จัดการ​ด้าน​ธุรกิจ​ผสม​ผสาน​วิทยาการ​ที่​ก้าวหน้า​ด้าน​เทคโนโลยี​สาร​สนเทศ​ให้​เกิด​ประโยชน์​สูงสุด​ต่อ​การ​บริหาร​งาน​ของ​องค์กร </p>
                            </div>
                            <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                        </div>
                        <p class="copyright">สาขาเทคโนโลยีสารสนเทศ © 2022</p>
                    </div>
                </footer>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
        </div>
    </footer>
   
</body>
</html>
<script>
$(document).ready(function () {

$('.menu').niceScroll({
  cursorcolor: '#999999', // Changing the scrollbar color
  cursorwidth: 4, // Changing the scrollbar width
  cursorborder: 'none', // Rempving the scrollbar border
});

// when opening the sidebar
$('.nav-icon').on('click', function () {
  // open sidebar
  $('.menu').toggleClass('open');
});

// if dismiss or overlay was clicked
$('#dismiss').on('click', function () {
  $('#sidenav').removeClass('open');
});
});


</script>
