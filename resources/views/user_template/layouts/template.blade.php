@php
    $categories = App\Models\Category::latest()->get();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>@yield('title_page')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/stylesheet.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('home/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('home/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
    <link rel="stylesoeet" href="{{asset('home/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
<!-- banner bg main start -->
<div class="banner_bg_main">
    <!-- header top section start -->
    <div class="container">
        <div class="header_section_top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <span class="toggle_icon" style="float: left; margin-left: 40px;width: 30px;margin-top: 10px" onclick="openNav()"><img src="{{asset('home/images/toggle-icon.png')}}"></span>

                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('men-product')}}">Men</a></li>
                            <li><a href="{{route('women-product')}}">Women</a></li>
                            <li><a href="{{route('kid-product')}}">Kid</a></li>
                        </ul>
                        <div class="login_menu" style="margin-right: 25px;margin-top: 2px">
                            <ul>
                                <li><a href="{{route('addtocart')}}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="padding_10">Cart</span></a>
                                </li>
                                <li><a href="{{route('pendingorders')}}">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span class="padding_10">profile</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- header top section start -->
    <!-- logo section start -->





{{--    <div class="logo_section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12">--}}
{{--                    <div class="logo"><a href="/"><img src="{{asset('home/images/logo.png')}}"></a></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- logo section end -->
    <!-- header section start -->
    <div class="header_section">
        <div class="container">
            <div class="containt_main">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="/">Home</a>
                    <a href="{{route('men-product')}}">Men</a>
                    <a href="{{route('women-product')}}">Women</a>
                    <a href="{{route('kid-product')}}">Kid</a>
                </div>

{{--                <div class="dropdown">--}}
{{--                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choose...--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <a class="dropdown-item" href="{{route('category',[$category->id,$category->slug])}}">{{$category->category_name}}</a>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                    <div class="login_menu">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">--}}
{{--                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>--}}
{{--                                    <span class="padding_10">Cart</span></a>--}}
{{--                            </li>--}}
{{--                            <li><a href="#">--}}
{{--                                    <i class="fa fa-user" aria-hidden="true"></i>--}}
{{--                                    <span class="padding_10">Cart</span></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->



    <div class="banner_section layout_padding"  id="banner_section" style=" background-image: url({{asset('home/images/mens_sustainable_banner-1200x602.png')}})">
        <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Men's Product</h1>
                                <div class="buynow_bt"><a href="{{route('men-product')}}">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="banner_taital">Women's Product</h1>
                                <div class="buynow_bt"><a href="{{route('women-product')}}">Buy Now</a></div>
                            </div>
                        </div>
                    </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="banner_taital">Kid's Product</h1>
                            <div class="buynow_bt"><a href="{{route('kid-product')}}">Buy Now</a></div>
                        </div>
                    </div>
                </div>
                </div>
                <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- banner section end -->

</div>


<!-- banner bg main end -->
<div class="container">
     @yield('main-content')
</div>
<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
{{--        <div class="footer_logo"><a href="index.html"><img src="{{asset('home/images/footer-logo.png')}}"></a></div>--}}
        <div class="footer_menu">
            <ul>
                @php
                    $categories = App\Models\Category::latest()->get();
                @endphp
                @foreach($categories as $category) @endforeach
                <li><a>Shop:</a></li>
                <li><a href="{{route('men-product')}}">Men</a></li>
                <li><a href="{{route('women-product')}}">Women</a></li>
                <li><a href="{{route('kid-product')}}">Kid</a></li>
            </ul>
        </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright_text">© 2020 All Rights Reserved.</p>
    </div>
</div>
<!-- copyright section end -->
<!-- Javascript files-->
<script src="{{asset('home/js/jquery.min.js')}}"></script>
<script src="{{asset('home/js/popper.min.js')}}"></script>
<script src="{{asset('home/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{asset('home/js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('home/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('home/js/custom.js')}}"></script>
<script>

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<script type="text/javascript">
    var counter = 1;
    setInterval(function (){
        document.getElementById('radio'+counter).clecked=true;
        counter++;
        if(counter>2){
            counter=1;
        }
    },5000)
</script>
<script>
    if (window.location.pathname === "/") {
        document.getElementById("banner_section").style.display = "block";
    } else {
        document.getElementById("banner_section").style.display = "none";
    }</script>
</body>
</html>
