<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>Hotel Management</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style type="text/css">
        * {box-sizing:border-box}

.slideshow-container {
  max-width: 1280px;
  position: relative;
  margin: auto;
}

.mySlides {
  display: none;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

.sub-section  {
    border-top: 1px solid black;
    display:block;
}
.sub-section .sub-section-left{
    display:inline-block;
    width:25%;
    float:left;
    clear:right;
}

.sub-section .sub-section-right {
    display:inline-block;
    width:75%;
    float:right;
}

p, h2 {
    font-family: all;
}


    </style>
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{Route('nav_home')}}"><img style="height: 90px; background-color: #f8f8f8" src="{{ asset('img/square_logo.png') }}"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ Route('nav_home')}}" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="/desc" class="smoothScroll">{{ trans('adminlte_lang::message.description') }}</a></li>
                    <li class="active"><a href="/contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a href="{{ route('hotel-management') }}">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <section id="slideshow" name="slideshow"></section>
        <div id="headerwrap">
            <div class="container">
                <div class="slideshow-container">

                    <div class="mySlides">
                      <img src="{{asset('/img/hotelslide.jpg')}}" style="width:100%">
                    </div>

                    <div class="mySlides">
                      <img src="{{asset('/img/hotelslide2.jpg')}}" style="width:100%">
                    </div>

                    <div class="mySlides">
                      <img src="{{asset('/img/hotelslide3.jpg')}}" style="width:100%">
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                </div>
                <div class="content">
                    <div class="sub-section">
                        <div>
                            <div class="sub-section-left">
                                <h2 style="color: red;">Mô tả</h2>
                            </div>
                            <div class="sub-section-right">
                                <p style="font-size:18px; padding: 20px;">
                                    Tất cả các phòng, được trang bị đầy đủ, phòng không hút thuốc, điều hòa, áo choàng tắm, báo hàng ngày, bàn, máy sấy tóc, internet (không dây). Khách sạn tuyệt vời ở Đà Lạt này cũng có dịch vụ phòng 24/giờ, thang máy, quầy bar / quán rượu, dịch vụ giặt là / giặt khô, nhà hàng, dịch vụ phòng, két sắt. Du khách thích thể thao hoặc giải trí sẽ được hài lòng với dịch vụ massage, bể sục, phòng tắm hơi, sân tennis, vườn tại khách sạn. Sự pha trộn dịch vụ chuyên nghiệp với các cơ sở nghệ thuật mang lại cho khách hàng một kỳ nghỉ đáng nhớ.
                                </p>
                            </div>
                        </div>

                        <div>
                            <div class="sub-section-left">
                                <p style="font-size:22px; font-family: all;">Phổ biến</p>
                            </div>
                            <div class="sub-section-right row">
                                <div class="col-3 col-sm-3 col-lg-3">
                                    <a href="/desc">
                                        <p style="font-family: all;"><i class="fas fa-coffee"></i> Bữa sáng</p>
                                    </a>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3">
                                    <a href="/desc">
                                        <p style="font-family: all;"><i class="fas fa-car"></i> Di chuyển</p>
                                    </a>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3">
                                    <a href="/contact">
                                        <p style="font-family: all;"><i class="fas fa-phone"> Liên lạc</i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->

    <section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>{{ trans('adminlte_lang::message.address') }}</h3>
                <p>
                    8 Ton That Thuyet,<br/>
                    Ha Noi,<br/>
                    Vietnam<br/>
                    Postal: 100000
                </p>
            </div>

            <div class="col-lg-7">
                <h3>{{ trans('adminlte_lang::message.dropus') }}</h3>
                <br>
                <form role="form" action="#" method="get" enctype="plain">
                    <div class="form-group">
                        <label for="name1">{{ trans('adminlte_lang::message.yourname') }}</label>
                        <input type="name" name="Name" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                    </div>
                    <div class="form-group">
                        <label for="email1">{{ trans('adminlte_lang::message.emailaddress') }}</label>
                        <input type="email" name="Mail" class="form-control" id="email1" placeholder="{{ trans('adminlte_lang::message.enteremail') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('adminlte_lang::message.yourtext') }}</label>
                        <textarea class="form-control" name="Message" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-large btn-success">{{ trans('adminlte_lang::message.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div id="c">
        <div class="container">
            <p>
                <a href="https://github.com/acacha/adminlte-laravel"></a><b>admin-lte-laravel</b></a>. {{ trans('adminlte_lang::message.descriptionpackage') }}.<br/>
                <strong>Copyright &copy; 2019 <a href="http://acacha.org">Acacha.org</a>.</strong> {{ trans('adminlte_lang::message.createdby') }} <a href="http://acacha.org/sergitur">Bao Hoang</a>. {{ trans('adminlte_lang::message.seecode') }} <a href="https://github.com/acacha/adminlte-laravel">Github</a> / <a href="github.com/vungochieu491999/eHotelManagement">Link code nhom 5</a>
                <br/>
                AdminLTE {{ trans('adminlte_lang::message.createdby') }} Abdullah Almsaeed <a href="https://almsaeedstudio.com/">almsaeedstudio.com</a>
                <br/>
                 Pratt Landing Page {{ trans('adminlte_lang::message.createdby') }} <a href="http://www.blacktie.co">BLACKTIE.CO</a>
            </p>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
<script>
    var slideIndex = 1;
var timer = null;
showSlides(slideIndex);

function plusSlides(n) {
  clearTimeout(timer);
  showSlides(slideIndex += n);
}


function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n==undefined){n = ++slideIndex}
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
  timer = setTimeout(showSlides, 2000);
}
</script>
</body>
</html>