@extends('client.index')


@section('content')

    <section id="sec2">
        <div class="container second-container product-row">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>
                        {{$product->name}}
                    </h1>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="user-name-item">
                        <div class="user-details">
                            <div class="user-image">
                                <img src="{{get_image($product->seller->avatar)}}">

                            </div>
                            <a href="{{route('ShowUser',[$product->seller->slug,$product->seller->id])}}">
                                {{$product->seller->name}}
                            </a>
                        </div>
                        @if(auth()->guard('clients')->check())
                            <div class="user-details" onclick="add_to_bookmark()">
                                <span id="show_text">
                                    به علاقمندی ها افزوده شد
                                </span>
                                <button class="bookmark {{ $is_fav ? 'marked' : '' }}"
                                        @if($is_fav) style='--default-y:0px; --background-height:19px; --default-position:0px;' @endif >
                                    <svg viewBox="0 0 36 36">
                                        <path class="filled"
                                              d="M26 6H10V18V30C10 30 17.9746 23.5 18 23.5C18.0254 23.5 26 30 26 30V18V6Z"/>
                                        <path class="default"
                                              d="M26 6H10V18V30C10 30 17.9746 23.5 18 23.5C18.0254 23.5 26 30 26 30V18V6Z"/>
                                        <path class="corner"
                                              d="M10 6C10 6 14.8758 6 18 6C21.1242 6 26 6 26 6C26 6 26 6 26 6H10C10 6 10 6 10 6Z"/>
                                    </svg>
                                </button>
                            </div>
                        @endif
                        <script>

                            function add_to_bookmark() {

                                document.getElementById('show_text').style.display = 'none';

                                $.ajax({
                                    method: 'GET',
                                    url: "{{ route('add_bookmark' , $product->id) }}",
                                    success: function (result) {
                                        document.getElementById('show_text').innerHTML = result;
                                        document.getElementById('show_text').style.display = 'block';
                                    }
                                });

                            }

                        </script>

                    </div>

                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="line">

                    </div>

                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 ">
                    <div class="product-image">
                        <img src="{{get_image($product->files->first()->thumbnail)}}">

                    </div>
                    @if($product->colors->count() > 0)
                        <div class="product-explain">
                            <p>
                                ترکیب رنگ
                            </p>
                            <div class="explain-details">
                                @foreach($product->colors as $color)
                                    <a href="{{ route('search') . '?color=' . $color->slug }}" class="color-details"
                                       style="background: {{ $color->color_code }}"></a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if($product->tags->count() >0)
                        <div class="product-explain">
                            <p>
                                کلمات مرتبط </p>
                            <div class=" tag-row">
                                @foreach($product->tags as $tag)
                                    <div class="tag-item">{{$tag->name}}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 size">
                    @foreach($product->files as $file)
                        <button class="button ">
                            <svg viewBox="0 0 132 48" preserveAspectRatio="none">
                                <path d="M5.45928701,0.5 C2.72034842,0.5 0.5,2.72034842 0.5,5.45928701 L0.5,43.3555486 C0.5,45.6444659 2.35553409,47.5 4.6444514,47.5 L5.00310912,47.5 L128.073835,47.5 C129.966054,47.5 131.5,45.9660538 131.5,44.0738352 L131.5,4.64556574 C131.5,2.356033 129.643967,0.5 127.354434,0.5 L5.45928701,0.5 Z"/>
                            </svg>
                            <div class="size-items  {{ $product->files->first() == $file ? 'active' : '' }}">

                                <div class="choose">
                                    <img src="{{ asset('client/assets//icons/tick.svg') }}">

                                </div>
                                <div>
                                    <h2>
                                        {{$file->size}}
                                    </h2>
                                    {{-- <p>
                                         سایز
                                         {{fa_number($file->sizes->first()->height)}}
                                         در
                                         {{fa_number($file->sizes->first()->width)}}
                                         پیکسل
                                     </p>--}}

                                </div>

                            </div>
                        </button>
                    @endforeach


                    @if($product->price == 0 || $has_buy_this_before)
                        <div class="product-details">
                            <h1>
                                @if($has_buy_this_before)
                                    خریداری شده
                                @else
                                    رایگان
                                @endif
                            </h1>
                            <a class="dl-button second-dl-button">
                                <div class="withdraw online-pay"
                                     onclick="(() => { setTimeout(() => {window.open('{{ get_image($download_link) }}' ,  '_blank')} , 3500) })()">
                                    <div class="icon">
                                        <div>
                                            <svg class="arrow" viewBox="0 0 20 18" fill="currentColor">
                                                <polygon points="8 0 12 0 12 9 15 9 10 14 5 9 8 9"></polygon>
                                            </svg>
                                            <svg class="shape" viewBox="0 0 20 18" fill="currentColor">
                                                <path
                                                        d="M4.82668561,0 L15.1733144,0 C16.0590479,0 16.8392841,0.582583769 17.0909106,1.43182334 L19.7391982,10.369794 C19.9108349,10.9490677 19.9490212,11.5596963 19.8508905,12.1558403 L19.1646343,16.3248465 C19.0055906,17.2910371 18.1703851,18 17.191192,18 L2.80880804,18 C1.82961488,18 0.994409401,17.2910371 0.835365676,16.3248465 L0.149109507,12.1558403 C0.0509788145,11.5596963 0.0891651114,10.9490677 0.260801785,10.369794 L2.90908938,1.43182334 C3.16071592,0.582583769 3.94095214,0 4.82668561,0 Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span></span>
                                    </div>
                                    <div class="label">
                                        <div class="show default">دانلود فایل</div>
                                        <div class="state">
                                            <div class="counter">
                                                <ul>
                                                    <li></li>
                                                    <li>۱</li>
                                                </ul>
                                                <ul>
                                                    <li>۰</li>
                                                    <li>۱</li>
                                                    <li>۲</li>
                                                    <li>۳</li>
                                                    <li>۴</li>
                                                    <li>۵</li>
                                                    <li>۶</li>
                                                    <li>۷</li>
                                                    <li>۸</li>
                                                    <li>۹</li>
                                                    <li>۰</li>
                                                </ul>
                                                <ul>
                                                    <li>۰</li>
                                                    <li>۱</li>
                                                    <li>۲</li>
                                                    <li>۳</li>
                                                    <li>۴</li>
                                                    <li>۵</li>
                                                    <li>۶</li>
                                                    <li>۷</li>
                                                    <li>۸</li>
                                                    <li>۹</li>
                                                    <li>۰</li>
                                                    <li>۱</li>
                                                    <li>۲</li>
                                                    <li>۳</li>
                                                    <li>۴</li>
                                                    <li>۵</li>
                                                    <li>۶</li>
                                                    <li>۷</li>
                                                    <li>۸</li>
                                                    <li>۹</li>
                                                    <li>۰</li>
                                                    <li>۱</li>
                                                    <li>۲</li>
                                                    <li>۳</li>
                                                    <li>۴</li>
                                                    <li>۵</li>
                                                    <li>۶</li>
                                                    <li>۷</li>
                                                    <li>۸</li>
                                                    <li>۹</li>
                                                    <li>۰</li>
                                                </ul>
                                                <span>%</span>
                                            </div>
                                            <span>شروع دانلود</span>
                                        </div>
                                    </div>
                                    <div class="progress"></div>
                                </div>
                            </a>


                        </div>
                    @elseif($client && $client->has_gold_card)
                        <div class="product-details buy-download">
                            <h1>
                                {{ fa_number(number_format($product->price)) }}
                            </h1>
                            <p>
                                تومان
                            </p>
                            <a href="">
                                <button class="gold-button"
                                        onclick="(() => { setTimeout(() => { window.location = '{{ route('pay_with_card' , $product->id) }}' }, 2000); })()">
                                    <span>پرداخت با گلد کارت
                                    </span>
                                    <div class="cart">
                                        <svg viewBox="0 0 36 26">
                                            <polyline
                                                    points="1 2.5 6 2.5 10 18.5 25.5 18.5 28.5 7.5 7.5 7.5"></polyline>
                                            <polyline points="15 13.5 17 15.5 22 10.5"></polyline>
                                        </svg>
                                    </div>
                                </button>
                            </a>
                            <a class="dl-button ">
                                <div class="withdraw online-pay">
                                    <div class="icon">
                                        <div>
                                            <svg class="arrow" viewBox="0 0 20 18" fill="currentColor">
                                                <polygon points="8 0 12 0 12 9 15 9 10 14 5 9 8 9"></polygon>
                                            </svg>
                                            <svg class="shape" viewBox="0 0 20 18" fill="currentColor">
                                                <path
                                                        d="M4.82668561,0 L15.1733144,0 C16.0590479,0 16.8392841,0.582583769 17.0909106,1.43182334 L19.7391982,10.369794 C19.9108349,10.9490677 19.9490212,11.5596963 19.8508905,12.1558403 L19.1646343,16.3248465 C19.0055906,17.2910371 18.1703851,18 17.191192,18 L2.80880804,18 C1.82961488,18 0.994409401,17.2910371 0.835365676,16.3248465 L0.149109507,12.1558403 C0.0509788145,11.5596963 0.0891651114,10.9490677 0.260801785,10.369794 L2.90908938,1.43182334 C3.16071592,0.582583769 3.94095214,0 4.82668561,0 Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span></span>
                                    </div>
                                    <div class="label">
                                        <div class="show default">دانلود فایل</div>
                                        <div class="state">
                                            <div class="counter">
                                                <ul>
                                                    <li></li>
                                                    <li>۱</li>
                                                </ul>
                                                <ul>
                                                    <li>۰</li>
                                                    <li>۱</li>
                                                    <li>۲</li>
                                                    <li>۳</li>
                                                    <li>۴</li>
                                                    <li>۵</li>
                                                    <li>۶</li>
                                                    <li>۷</li>
                                                    <li>۸</li>
                                                    <li>۹</li>
                                                    <li>۰</li>
                                                </ul>
                                                <ul>
                                                    <li>۰</li>
                                                    <li>۱</li>
                                                    <li>۲</li>
                                                    <li>۳</li>
                                                    <li>۴</li>
                                                    <li>۵</li>
                                                    <li>۶</li>
                                                    <li>۷</li>
                                                    <li>۸</li>
                                                    <li>۹</li>
                                                    <li>۰</li>
                                                    <li>۱</li>
                                                    <li>۲</li>
                                                    <li>۳</li>
                                                    <li>۴</li>
                                                    <li>۵</li>
                                                    <li>۶</li>
                                                    <li>۷</li>
                                                    <li>۸</li>
                                                    <li>۹</li>
                                                    <li>۰</li>
                                                    <li>۱</li>
                                                    <li>۲</li>
                                                    <li>۳</li>
                                                    <li>۴</li>
                                                    <li>۵</li>
                                                    <li>۶</li>
                                                    <li>۷</li>
                                                    <li>۸</li>
                                                    <li>۹</li>
                                                    <li>۰</li>
                                                </ul>
                                                <span>%</span>
                                            </div>
                                            <span>شروع دانلود</span>
                                        </div>
                                    </div>
                                    <div class="progress"></div>
                                </div>
                            </a>
                            <p class="gold-card-details">
                                شما {{ $client->has_gold_card->count }} عکس دیگر میتوانید با گلد کارت دانلود کنید
                            </p>

                        </div>

                    @else
                        <div class="product-details">
                            <h1>
                                {{ fa_number(number_format($product->price)) }}
                            </h1>
                            <p>
                                تومان
                            </p>
                            <div onclick="(() => { window.location = '{{ route('pay_product' , $product->id) }}'})()"
                                 class="withdraw withdraw-hover ">
                                <img src="{{ asset('client/assets/icons/pluse.svg') }}">
                                پرداخت آنلاین

                            </div>
                        </div>
                    @endif


                    {{--                    single product my files --}}

                    @if($is_him)
                        <div class="product-details">
                            <div class="myfiles-item">

                                تا این لحظه
                                {{ fa_number($product->views) }}
                                بار بازدید شده و در مجموع {{ $all_buy }} خرید انجام شده
                            </div>
                        </div>
                    @endif


                </div>

                @if(count($related) > 0)
                    <div class="col-lg-12 col-md-12">
                        <div class="line">

                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="user-name-item">
                            <div class="user-details">
                                <img style="margin-left: 15px;" src="{{asset('client/assets//icons/Time Square.png')}}">


                                تصاویر مرتبط

                            </div>
                        </div>
                        <div class="staggered-gallery">
                            <div class="masonry">
                                @each('components.brick' , $related , 'product')
                            </div>

                        </div>

                    </div>
                @endif
            </div>


        </div>

    </section>


@endsection