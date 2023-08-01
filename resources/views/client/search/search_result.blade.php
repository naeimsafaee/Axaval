@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="container">
            @if($products->count() > 0)
                <div class="maintitle">
                    <div>
                        <h2>

                            نتایج
                            @if(Request::has('search'))
                                {{ Request::input('search') }}
                            @endif
                            @if(Request::has('category'))
                                {{ " در دسته بندی " . Request::input('category') }}
                            @endif
                            @if(Request::has('size'))
                                {{ " در سایز " . Request::input('size') }}
                            @endif
                            @if(Request::has('color'))
                                {{ " در طیف رنگی " . Request::input('color') }}
                            @endif
                        </h2>
                        <p>
                            الان {{$count}} نتیجه یافت شد

                        </p>

                    </div>
                    <div class="filter-row">

                        <div id="color" class="filter-item">
                            <img src="client/assets/icons/bottom-arrow.svg">

                            فیلتر طیف رنگی
                            <div id="color-details" class="filter-details">
                                <div>
                                    <span>
                                        طیف رنگی
                                    </span>
                                    <span>
                                        <img src="{{ asset('client/assets/icons/color.svg') }}">
                                    </span>
                                </div>
                                <div class="color-paicker">
                                    @foreach ($color as $clr)
                                        <div class="color-item @if(Request::has('color') && ($clr->slug == Request::input('color'))) active @endif"
                                             style="border: 1px solid {{ $clr->color_code }};background: {{ $clr->color_code }}"
                                             onclick="(() => { window.location = '{{ route("search" , array_merge(request()->query->all(), ["color" => $clr->slug])) }}'})()">
                                            <div style="background: {{ $clr->color_code }};">

                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>

                        <div id="size" class="filter-item">
                            <img src="client/assets/icons/bottom-arrow.svg">
                            همه سایز ها

                            <div id="size-details" class="filter-details">
                                <div style="margin-bottom: 30px;">

                                        <span>
                                            سایز ها

                                        </span>
                                    <span>
                                            <img src="{{ asset('client/assets/icons/size.svg') }}">

                                        </span>
                                </div>

                                @foreach($sizes as $key => $size)
                                    <div class="size-picker">
                                    <span onclick="(()=>{ window.location = '{{ route('search' , array_merge(request()->query->all(), ['size' => config('Constants.SIZES.' . $key)])) }}' })()">
                                        {{ $size }}
                                    </span>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div id="file" class="filter-item">
                            <img src="client/assets/icons/bottom-arrow.svg">
                            نوع تصویر


                            <div id="file-details" id="size-details" class="filter-details">

                                <div style="margin-bottom: 30px;">

                                    <span>
                                        نوع فایل
                                    </span>
                                    <span>
                                        <img src="client/assets/icons/file.svg">
                                    </span>
                                </div>

                                @foreach(config('Constants.FILE_TYPE') as $key => $value)

                                    <div class="file-item"
                                         onclick="(()=>{ window.location = '{{ route('search' , array_merge(request()->query->all(), ['type' => config('Constants.FILE_TYPE_TRANS.' . $key)])) }}' })()">
                                        {{ config('Constants.FILE_TYPE_TRANS.' . $key) }}
                                    </div>


                                @endforeach

                            </div>
                        </div>

                        <div id="filter" class="filter-item">
                            <img src="client/assets/icons/bottom-arrow.svg">
                            دسته بندی
                            <div id="filter-details" id="size-details" class="filter-details">
                                <div style="margin-bottom: 30px;">

                                        <span>
                                            دسته بندی

                                        </span>
                                    <span>
                                            <img src="client/assets/icons/filter.svg">

                                        </span>

                                </div>
                                <div class="form-item">
                                    <img src="client/assets/icons/search.svg">
                                    <input type="text" placeholder="جستجو در تصاویر">
                                </div>

                                <div class="tag-row">
                                    @if(Request::has('category'))
                                        <div class="tag-item"
                                             onclick='(() => { window.location = "{{ route('search' , array_diff(request()->query->all() , [Request::input('category')])) }}" })()'>
                                            <img src="client/assets/icons/filter-close.svg">{{ Request::input('category') }}
                                        </div>
                                    @endif
                                </div>
                                <ul>{{--
                                @foreach ($category as $ctg)
                                    <li><a href="{{ route('search' , array_merge(request()->query->all(), ['category' => Request::input('category') . "," . $ctg->slug ])) }}">{{$ctg->name}}</a></li>
                                @endforeach--}}
                                </ul>

                                <script>

                                    let filter_items = [
                                        @foreach($category as $ctg)
                                            "{{ $ctg->name }}",
                                        @endforeach
                                    ]
                                    let filter_items_href = [
                                        @foreach($category as $ctg)
                                            "{{ route('search' , array_merge(request()->query->all(), ['category' => $ctg->slug])) }}",
                                        @endforeach
                                    ]

                                </script>

                            </div>

                        </div>

                    </div>

                </div>
                <div class="staggered-gallery">
                    <div id="masonry" class="masonry">
                        @each('components.brick' , $products , 'product')

                    </div>

                </div>
                @if($has_more)
                    <div id="submit" class="more-item" onclick="get_more()">
                        <span class="its">
                            تصاویر بیشتر
                        </span>

                        <span class="circle"></span>
                        <span class="circle"></span>
                        <span class="circle"></span>
                    </div>
                @endif
            @else
                <div class="error-massage">
                    <h1>
                        404
                    </h1>
                    <p>
                        چیزی پیدا نشد مجدد جستجو کنید
                    </p>
                </div>
            @endif

        </div>

    </section>

    <script>

        let page = 1;

        function get_more() {

            const url = "{{ route('search_api') }}";


            const getting = $.get(url, {
                {{ Request::has('search') ? ("search:`" . Request::Input('search') . "`,") : "" }}
                        {{ Request::has('category') ? ("category:`" . Request::Input('category') . "`,") : "" }}
                        {{ Request::has('type') ? ("type:`" . Request::Input('type') . "`,") : "" }}
                page: page
            });
            page++;

            const main = document.getElementById('masonry');

            getting.done((data) => {
                // data = JSON.parse(data);
                console.log(data);

                for (let i = 0; i < data.length; i++) {

                    const div = document.createElement('div');

                    div.className = 'brick';

                    div.innerHTML = `
                        <img class="overlay" src="client/assets/photo/fade.png">
                        <img src="` + data[i].files[0].thumbnail + `">`;

                    main.appendChild(div);
                }

            });
            getting.fail((err) => {
                console.log(err);
            });

        }

    </script>

@endsection