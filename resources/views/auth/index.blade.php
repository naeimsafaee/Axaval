<!DOCTYPE html>
<html lang="far">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/assets/icons/Union.svg')}}">
    <title>{{ setting('site.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="client/assets/css/master.css" rel="stylesheet">
    <script src="client/assets/js/JQUERY.js"></script>
    <script src="client/assets/js/BOOTSTRAP.js"></script>
    <script src="client/assets/js/ajax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.1.0/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700&amp;display=swap">-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.0/gsap.min.js"></script>

    <style>

        .invalid-feedback {
            direction: rtl;
        }

    </style>

</head>

<body id="pages" class="login-page">
<div class="container-fluid">


    @yield('background')


    <div class="row first-row">

        @include('auth.header')

        @yield('content')

        @include('auth.footer')

    </div>

</div>


@yield('optional_footer_1')

<script src="client/assets/js/input-hover.js"></script>
<script src="client/assets/js/social-hover.js"></script>

@yield('optional_footer')


</body>

</html>



