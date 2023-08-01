<!DOCTYPE html>
<html lang="far">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/assets/icons/Union.svg')}}">
    <title>{{ setting('site.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset ('client/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset ('client/assets/css/inter.min.css')}}" rel="stylesheet">
    <link href="{{asset ('client/assets/css/master.css?x=4')}}" rel="stylesheet">

    <script src="{{asset('client/assets/js/JQUERY.js')}}"></script>
    <script src="{{asset('client/assets/js/BOOTSTRAP.js')}}"></script>
    <script src="{{asset('client/assets/js/ajax.js')}}"></script>
    <script src="{{asset('client/assets/js/gsap.min.js')}}"></script>
    <script src="{{asset('client/assets/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('client/assets/js/gsap3.4.0.min.js')}}"></script>

    @yield('styles')


</head>

<body id="pages">

@include('client.header')

@yield('content')

@include('client.footer')

@yield('optional_footer')


<script>


    jQuery('.size .size-items').click(function (event) {
        jQuery('.active').removeClass('active');
        jQuery(this).toggleClass('active');
        event.preventDefault();
    });
</script>

<script src="{{ asset('client/assets/js/gold-card-hover.js') }}"></script>
<script src="{{ asset('client/assets/js/download-file.js') }}"></script>
<script src="{{ asset('client/assets/js/bookmark.js') }}"></script>
<script src="{{ asset('client/assets/js/size-chose.js') }}"></script>
<script src="{{ asset('client/assets/js/search-result.js') }}"></script>
<script src="{{ asset('client/assets/js/social-hover.js') }}"></script>
<script src="{{ asset('client/assets/js/input-hover.js') }}"></script>
<script src="{{ asset('client/assets/js/master.js') }}"></script>

</body>

</html>
