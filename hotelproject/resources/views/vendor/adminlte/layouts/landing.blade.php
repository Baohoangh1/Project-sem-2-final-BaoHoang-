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
                    <li class="active"><a href="{{ Route('nav_home')}}" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="/desc" class="smoothScroll">{{ trans('adminlte_lang::message.description') }}</a></li>
                    <li><a href="/contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
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


    <section id="desc" name="desc"></section>
    <!-- INTRO WRAP -->
    <div id="intro">
        <div class="container">
            <div class="row centered">
                <h1>{{ trans('adminlte_lang::message.designed') }}</h1>
                <br>
                <br>
                <div class="col-lg-4">
                    <img src="{{ asset('/img/intro01.png') }}" alt="">
                    <h3>{{ trans('adminlte_lang::message.community') }}</h3>
                    <p>We are connected inside <a href="github.com/vungochieu491999/eHotelManagement">github</a></p>
                    <p>We are a friendly community who helps others</p>
                    <p>We are connected with other communities</p>
                    
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('/img/intro02.png') }}" alt="">
                    <h3>{{ trans('adminlte_lang::message.schedule') }}</h3>
                    <p>We are super on time</p>
                    <p>We are 24-hour <a href="">active</a></p>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('/img/intro03.png') }}" alt="">
                    <h3>{{ trans('adminlte_lang::message.technology') }}</h3>
                    <p>We are highly equiped with advanced developments</p>
                    <p>We are bussinesses with companies all over the world</p>
                </div>
            </div>
            <br>
            <hr>
        </div> <!--/ .container -->
    </div><!--/ #introwrap -->

    <!-- FEATURES WRAP -->
    <div id="features">
        <div class="container">
            <div class="row">
                <h1 class="centered">{{ trans('adminlte_lang::message.reason') }}</h1>
                <br>
                <br>
                <div class="col-lg-6 centered">
                    <img class="centered" src="{{ asset('/img/mobile.png') }}" alt="">
                </div>

                <div class="col-lg-6">
                    <h3>{{ trans('adminlte_lang::message.features') }}</h3>
                    <br>
                    <!-- ACCORDION -->
                    <div class="accordion ac" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    {{ trans('adminlte_lang::message.design') }}
                                </a>
                            </div><!-- /accordion-heading -->
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    {{ trans('adminlte_lang::message.retina') }}
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                    {{ trans('adminlte_lang::message.support') }}
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                    {{ trans('adminlte_lang::message.responsive') }}
                                </a>
                            </div>
                            <div id="collapseFour" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>
                    </div><!-- Accordion -->
                </div>
            </div>
        </div><!--/ .container -->
    </div><!--/ #features -->


    <section id="showcase" name="showcase"></section>
    <div id="showcase">
        <div class="container">
            <div class="row">
                <h1 class="centered">{{ trans('adminlte_lang::<message class="insights"></message>') }}</h1>
                <br>
                <div class="col-lg-8 col-lg-offset-2">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ asset('/img/item-01.png') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('/img/item-02.png') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('/img/item-01.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div><!-- /container -->
    </div>


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
