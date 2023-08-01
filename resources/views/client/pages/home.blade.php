<!DOCTYPE html>
<html lang="far">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/assets/icons/Union.svg')}}">
    <title>{{ setting('site.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('client/assets/css/master.css')}}" rel="stylesheet">
    <link href="{{asset('client/assets/css/Owl-Carousel.css')}}" rel="stylesheet">
    <link href="{{asset('client/assets/css/Owl.css')}}" rel="stylesheet">

    <script src="{{asset('client/assets/js/JQUERY.js')}}"></script>
    <script src="{{asset('client/assets/js/BOOTSTRAP.js')}}"></script>
    <script src="{{asset('client/assets/js/ajax.js')}}"></script>
    <script src="{{asset('client/assets/js/Owl-Carousel.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/gsap.min.js"></script>

    <style>
        .bckgroung-imge:before{
            width:100%;
            height:100%;
            content : "";
            position : absolute;
            z-index:0;
            top:0;
            right:0;
            background-image: linear-gradient(180deg, rgba(0,0,0,0.5),transparent)
        }
    </style>



</head>

<body class="home">


<div class="container-fluid">
    <div class="mainoverlay">

    </div>
    <div class="bckgroung-imge">
        <!--            <img id="img" src="assets/photo/Rectangle 22.png">-->
        <div class="slider ">
            <div class="owl-carousel owl-theme one">

                @foreach($last_products as $product)
                    <div style="background-image: url('{{ get_image($product->product->files->first()->thumbnail) }}')"
                         class="item-box "></div>
                @endforeach
                {{--<div style="background-image: url('client/assets/photo/sample 2.jpeg')" class="item-box "></div>
                <div style="background-image: url('client/assets/photo/sample1.jpg')" class="item-box "></div>
                <div style="background-image: url('client/assets/photo/sample 3.jpeg')" class="item-box "></div>
                <div style="background-image: url('client/assets/photo/Rectangle 22.png')" class="item-box "></div>
                <div style="background-image: url('client/assets/photo/sample 2.jpeg')" class="item-box "></div>
                <div style="background-image: url('client/assets/photo/sample1.jpg')" class="item-box "></div>
                <div style="background-image: url('client/assets/photo/sample 3.jpeg')" class="item-box "></div>--}}
            </div>

        </div>
    </div>

    <div class="menu">
        <img class="closemenu" src="{{asset('client/assets/icons/close.svg')}}">
        <div class="menu-items">
            <a class="user-account">
                    <span>
                        <img src="{{asset('client/assets/icons/user2.svg')}}">
                    </span>
                <span class="text">
                        حساب کاربری
                    </span>
            </a>
            <a class="price" href="{{ route('pricing') }}">

                تعرفه قیمت
            </a>
            <a id="customer-panel" class="price ">

                پنل فروشنده
            </a>
        </div>


        <ul>
            @foreach($categories as $category)
                <li><a href="{{ route('search') }}?category={{ $category->slug }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>

    </div>
    <div class="row first-row">
        <section id="header">
            <nav>
                <a class="logo" href="{{ env('APP_URL') }}">
                    <img class="logo1" src="{{asset('client/assets/icons/logo.svg')}}">
                    <img class="logo2" src="{{asset('client/assets/icons/Union.svg')}}">

                </a>

                <ul class="responsive-nav">
                    <li class="items">
                        <a href="#">
                                    <span>
                                        <img src="{{asset('client/assets/icons/menu.svg')}}">
                                    </span>
                            <span class="text">
                                        دسته بندی
                                    </span>

                        </a>
                    </li>
                    <li>
                        <a href="{{ auth()->guard('clients')->check() ? route('profile') : route('login') }}">
                            <span>
                                <img src="{{asset('client/assets/icons/profile.svg')}}">
                            </span>
                            <span class="text">
                                حساب کاربری
                            </span>
                        </a>
                    </li>
                    <li><a class="price" href="{{ route('pricing') }}">

                            تعرفه قیمت
                        </a></li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <img src="{{asset('client/assets/icons/menu.svg')}}">
                </button>
            </nav>

        </section>
        <section id="sec2">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="main-title">
                            <p>
                                تا این لحظه {{ $all_product_count }} عکس در مخزن عکس اول ذخیره شد
                                <span class="add-image">
                                        @if($is_seller)
                                        <a href="{{ route('upload') }}">
                                            ثبت تصویر در مخزن
                                        </a>
                                        @else
                                            <a href="{{ route('request_seller') }}">
                                        ثبت تصویر در مخزن
                                        </a>
                                        @endif
                                    </span>
                            </p>
                            <h2 class="title">
                                تصاویر با کیفیت توسط بهترین عکاسان ایرانی
                            </h2>
                            <div class="input-item ">
                                <div class="text-item">
                                    <img src="{{asset('client/assets/icons/search.svg')}}">
                                    <form action="{{ route('search') }}" method="GET">
                                        <input name="search" type="text" placeholder="جستجو در تصاویر">
                                    </form>
                                </div>
                                <button class="clear">
                                    <svg viewBox="0 0 24 24">
                                        <path class="line" d="M2 2L22 22"/>
                                        <path class="long" d="M9 15L20 4"/>
                                        <path class="arrow" d="M13 11V7"/>
                                        <path class="arrow" d="M17 11H13"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>

        <section id="sec3">


            <div class="row footer">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div id="sec4">
                        <div class="row footer ">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="btns">
                                    <div class="customNextBtn right"><img
                                                src="{{asset('client/assets/icons/right.svg')}}"></div>
                                    <div class="customPreviousBtn left nonl"><img
                                                src="{{asset('client/assets/icons/left.svg')}}"></div>
                                    <p>
                                        تازه ترین تصاویر اضافه شده 
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <div class="slider-two">
                                    <div class="owl-carousel owl-theme two">
                                        @foreach($last_products as $product)
                                            <div style="background-image: url('{{ get_image($product->product->files->first()->thumbnail) }}')" data-url="{{ route('single_product' , [$product->product->slug , $product->product->id]) }}"
                                                 class="item {{ $product->id == $last_products->first()->id ? "active" : "" }}"  onclick="change_name({{$loop->index}})"></div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 user-row">
                                <a class="user-name" id="username">
                                    عکس از فرهاد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9 col-sm-12 ">
                    <ul>
                        <li>
                            <a href="{{route ('support')}}">
                                پشتیبانی

                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us') }}">
                                تماس با ما

                            </a>
                        </li>
                        <li>
                            {{--                            class="active"--}}
                            <a href="{{ route('request_seller') }}">
                                احراز هویت

                            </a>
                        </li>
                        <li>
                            <a href="{{route('about_us')}}">
                                درباره ما

                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}">
                                پرسش و پاسخ های متداول

                            </a>
                        </li>
                        <li>
                            <a href="{{ route('blogs') }}">
                                وبلاگ
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="col-lg-6 col-md-3 col-sm-12">
                    <ul class="social-icons">
                        <li class="social-item">
                            <a href="{{ setting('social.facebook') }}">
                                <img src="{{asset('client/assets/icons/facebook.svg')}}">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="{{ setting('social.youtube') }}">
                                <img src="{{asset('client/assets/icons/youtube.svg')}}">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="{{ setting('social.tweeter') }}">
                                <img src="{{asset('client/assets/icons/twiter.svg')}}">
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="{{ setting('social.instagram') }}">
                                <img src="{{asset('client/assets/icons/instagram.svg')}}">
                            </a>
                        </li>
                    </ul>


                </div>
            </div>

        </section>


    </div>

</div>

<script src="{{asset('client/assets/js/owl-slider.js')}}"></script>
<script src="{{asset('client/assets/js/social-hover.js')}}"></script>
<script src="{{asset('client/assets/js/input-hover.js')}}"></script>
<script src="{{asset('client/assets/js/master.js')}}"></script>
<script>
    var photographer = [
        @foreach($last_products as $product)
            "{{ $product->product->seller->name }}",
        @endforeach
    ]
    var photographer_route =[
        @foreach($last_products as $product)
            "{{route("ShowUser" , [$product->product->seller->slug , $product->product->seller->id ])}}" ,
        @endforeach
    ]


    change_name(0);
    function change_name(index){
        $("#username").html("عکس از "+photographer[index]);
        $("#username").attr("href" , photographer_route[index]);
        console.log(photographer[index]);
        // var c = $(".slider .owl-item.active").index();
        // if(index == c ){
        //     var urlItem = $('.slider-two .item').eq(c).attr("data-url");
        //     console.log(urlItem);
        // } 

        // lastIndex =c;
        // console.log(c);
    }
</script>
</body>
</html>