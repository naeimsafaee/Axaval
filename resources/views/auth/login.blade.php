<!DOCTYPE html>
<html lang="far">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="client/assets/svg/golmagramlogo.svg">
    <title>Axaval</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="client/assets/css/master.css" rel="stylesheet">
    <script src="client/assets/js/JQUERY.js"></script>
    <script src="client/assets/js/BOOTSTRAP.js"></script>
    <script src="client/assets/js/ajax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.1.0/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/gsap.min.js"></script>


</head>

<body id="pages" class="login-page">


<div class="container-fluid">
    <div class="background">
        <img src="client/assets/photo/portrait-concentrated-bearded-man 1-1.png">


    </div>


    <div class="row first-row">
        <section id="header">
            <nav>
                <a class="logo navbar-brand">
                    <img src="client/assets/icons/logo2.svg">
                </a>

                <a class="back" href="{{ env('APP_URL') }}">
                    <img src="client/assets/icons/back.svg">
                    صفحه اصلی
                </a>


            </nav>


        </section>

        <section id="sec2">
            <div class="block">
                <div class="login-form">
                    <div class="login-item">
                        <img src="client/assets/icons/cellphone.svg">

                    </div>
                    <h1>
                        ورود به حساب کاربری
                    </h1>
                    <p>
                        شماره موبایل خود را وارد نمایید
                    </p>
                    <!-- <form> -->
                    <form method="post" action="{{ route('register') }}" id="main_form">
                        @csrf
                        <div class="input-item ">
                            <div class="text-item">
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="شماره موبایل">
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button class="clear" >
                                <svg viewBox="0 0 24 24">
                                    <path class="line" d="M2 2L22 22"/>
                                    <path class="long" d="M9 15L20 4"/>
                                    <path class="arrow" d="M13 11V7"/>
                                    <path class="arrow" d="M17 11H13"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- </form> -->


                    <div class="withdraw change-submit max-width" onclick="(() => { document.getElementById('main_form').submit() })()">
                        <img src="client/assets/icons/continue.svg">
                        ادامه
                    </div>
                </div>

            </div>


        </section>

        @include('client.footer')

        {{--<section id="sec3">
            <div class="row footer">
                <div class="col-lg-6 col-md-9 col-sm-12 ">
                    <ul>
                        <li>
                            <a>
                                پشتیبانی

                            </a>
                        </li>
                        <li>
                            <a>
                                تماس با ما

                            </a>
                        </li>
                        <li>
                            <a class="active">
                                پنل فروشندگان

                            </a>
                        </li>
                        <li>
                            <a>
                                درباره ما

                            </a>
                        </li>


                    </ul>

                </div>
                <div class="col-lg-6 col-md-3 col-sm-12">
                    <ul class="social-icons">
                        <li class="social-item">
                            <a>
                                <img class="web" src="client/assets/icons/facebook.svg">
                                <img class="mobile" src="client/assets/icons/fasebook2.svg">

                            </a>
                        </li>
                        <li class="social-item">
                            <a>
                                <img class="web" src="client/assets/icons/youtube.svg">
                                <img class="mobile" src="client/assets/icons/youtube2.svg">

                            </a>
                        </li>
                        <li class="social-item">
                            <a>
                                <img class="web" src="client/assets/icons/twiter.svg">
                                <img class="mobile" src="client/assets/icons/twiter2.svg">

                            </a>
                        </li>
                        <li class="social-item">
                            <a>
                                <img class="web" src="client/assets/icons/instagram.svg">
                                <img class="mobile" src="client/assets/icons/instagram2.svg">

                            </a>
                        </li>
                    </ul>


                </div>
            </div>

        </section>--}}
    </div>

</div>

<script src="client/assets/js/input-hover.js"></script>

<script src="client/assets/js/social-hover.js"></script>


</body>

</html>
