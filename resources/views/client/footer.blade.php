<section id="sec3">
    <div class="row footer">
        <div class="col-lg-6 col-md-9 col-sm-12 ">
            <ul>
                <li>
                    <a href="{{route ('support')}}">
                        پشتیبانی

                    </a>
                </li>
                <li>
                    <a href="{{route('contact_us')}}">
                        تماس با ما

                    </a>
                </li>
                <li>
{{--                    class="active"--}}
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
                    <a href="{{route('faq')}}">
                        پرسش و پاسخ های متداول

                    </a>
                </li>
                <li>
                    <a href="{{route('blogs')}}">
                        وبلاگ
                    </a>
                </li>
            </ul>

        </div>
        <div class="col-lg-6 col-md-3 col-sm-12">
            <ul class="social-icons">
                <li class="social-item">
                    <a href="{{ setting('social.facebook') }}">
                        <img src="{{asset('client/assets/icons/fasebook2.svg')}}">
                    </a>
                </li>
                <li class="social-item">
                    <a href="{{ setting('social.youtube') }}">
                        <img src="{{asset('client/assets/icons/youtube2.svg')}}">
                    </a>
                </li>
                <li class="social-item">
                    <a href="{{ setting('social.tweeter') }}">
                        <img src="{{asset('client/assets/icons/twiter2.svg')}}">
                    </a>
                </li>
                <li class="social-item">
                    <a href="{{ setting('social.instagram') }}">
                        <img src="{{asset('client/assets/icons/instagram2.svg')}}">
                    </a>
                </li>
            </ul>


        </div>
    </div>

</section>
</div>

</div>
