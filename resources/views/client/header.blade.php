<div class="container-fluid">

    <div class="mainoverlay">

    </div>
    <div class="menu">
        <img class="closemenu" src="{{asset('client/assets/icons/close.svg')}}">
        <div class="menu-items">
            <a href="{{ auth()->guard('clients')->check() ? route('profile') : route('login') }}" class="user-account">
                <span>
                    <img src="{{asset('client/assets/icons/user2.svg')}}">
                </span>
                <span class="text">
                    حساب کاربری
                </span>
            </a>
            <a class="price" href="{{route('pricing')}}">

                تعرفه قیمت
            </a>
            @if(auth()->guard('clients')->check() && auth()->guard('clients')->user()->is_seller)
                <a id="upload" class="price " href="{{ route('upload') }}">

                    آپلود
                    <img src="{{ asset('client/assets/icons/upload.svg') }}">

                </a>
            @else
                <a id="customer-panel" class="price " href="{{ route('request_seller') }}">

                    پنل فروشنده
                </a>
            @endif
        </div>


        <ul>
            @foreach(\App\Models\Category::all() as $category)
                <li><a href="{{ route('search') }}?category={{ $category->slug }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>

    </div>

    <div class="row main-first-row">
        <section id="header">
            <nav>
                <a class="logo navbar-brand" href="{{ env('APP_URL') }}">
                    <img class="logo1" src="{{asset('client/assets/icons/black-logo.svg')}}">
                    <img class="logo2" src="{{asset('client/assets/icons/Union.svg')}}">
                </a>

                <ul class="responsive-nav">
                        <span id="line">

                        </span>
                    <li class="items mobile">
                        <a href="#">
                                <span>
                                    <img src="{{asset('client/assets/icons/menu2.svg')}}">
                                </span>
                            <span class="text">
                                    دسته بندی
                                </span>

                        </a>
                    </li>
                    <li class="mobile">
                        <a href="{{ auth()->guard('clients')->check() ? route('profile') : route('login') }}">
                            <span>
                                <img src="{{asset('client/assets/icons/user2.svg')}}">
                            </span>
                            <span class="text">
                                حساب کاربری
                            </span>

                        </a>
                    </li>
                    <li><a class="price" href="{{route('pricing')}}">

                            تعرفه قیمت
                        </a></li>
                    <li class="nav-item  header-item">
                        <div class="input-item ">
                            <div class="text-item">
                                <img src="{{asset('client/assets/icons/search.svg')}}">

                                <form action="{{ route('search') }}" method="GET">
                                    <input name="search" type="text" placeholder="جستجو در تصاویر" value="{{ request()->search ?? "" }}">
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
                    </li>
                    <li class="customer-panel nav-item ">
                        @if(auth()->guard('clients')->check() && auth()->guard('clients')->user()->is_seller)
                            <a id="upload" class="price " href="{{ route('upload') }}">

                                آپلود
                                <img src="{{ asset('client/assets/icons/upload.svg') }}">

                            </a>
                        @else
                            <a id="customer-panel" class="price " href="{{ route('request_seller') }}">

                                پنل فروشنده
                            </a>
                        @endif

                    </li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <img src="{{asset('client/assets/icons/menu2.svg')}}">
                </button>

            </nav>


        </section>