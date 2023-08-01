@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="container">
            <div class="profile second-profile">
                <div style="margin-bottom: 0;" class="profile ">

                    @if($client->avatar)
                        <div class="image-box">
                            <img src="{{ get_image($client->avatar) }}">
                        </div>
                    @else
                        <div class="image-box">
                            <img src="client/assets/photo/avatar.png">
                        </div>
                    @endif
                    @if($client->seller->is_active > 3)
                        <div class="waiting-row">
                            <div id="submit-verify" class="waiting ">
                                <img src="client/assets//icons/tick.svg">

                            </div>

                        </div>
                    @else
                        <div class="waiting-row">
                            <div class="waiting">
                                <img src="client/assets/icons/waiting.svg">

                            </div>
                            <p>
                                در انتظار تایید
                            </p>
                        </div>
                    @endif

                    <h1>
                        {{ $client->name }}
                    </h1>
                    <p>
                        {{ $client->description  }}

                    </p>

                    <a class="edit-profile" href="{{route ('editProfile')}}">
                        <img src="client/assets//icons/setting.svg">
                        ویرایش پروفایل


                    </a>
                    @if($client->seller->is_active > 3)
                        <div class="blance">
                            موجودی حساب شما
                        </div>
                        <h5 class="balence-value">
                            {{ $client->seller->wallet }} هزار تومان

                        </h5>
                        @if($client->seller->wallet > 0)
                            <a href="{{route('request_money')}}">
                                <div class="withdraw">
                                    درخواست تسویه حساب

                                </div>
                            </a>
                        @endif
                    @endif
                    <div class="line">

                    </div>
                </div>

                <div class="tab-frame verify-tab">
                    <input type="radio" checked name="tab" id="tab1">
                    <label for="tab1">
                        <div class="green-circle">

                        </div>
                        فروش های من
                    </label>
                    <input type="radio" name="tab" id="tab2">
                    <label for="tab2">
                        <div class="green-circle">

                        </div>
                        فایل های من
                    </label>
                    <input type="radio" name="tab" id="tab3">
                    <label for="tab3">
                        <div class="green-circle">

                        </div>
                        خرید های من
                    </label>

                    <input type="radio" name="tab" id="tab4">
                    <label for="tab4">
                        <div class="green-circle">

                        </div>
                        تراکنش ها
                    </label>

                    <input type="radio" name="tab" id="tab5">
                    <label for="tab5">
                        <div class="green-circle">

                        </div>
                        علاقه مندی ها
                    </label>

                    <div class="tab-content">

                        @if(count($seller_sells) > 0)
                            <div class="tab tab-2">
                                <table>
                                    <thead>
                                    <tr class="tr">
                                        <th class="child1">نام فایل</th>

                                        <th class="child2">نوع</th>
                                        <th class="child3"> قیمت</th>
                                        <th class="child4">تاریخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($seller_sells as $product)

                                        <tr class="tr">
                                            <td class="child1" data-column="توضیح  ">{{ $product->name }}</td>
                                            <td class="child2" data-column=" نوع ">{{ $product->type_string }}</td>
                                            <td class="child3" data-column=" قیمت ">{{ $product->price }}</td>
                                            <td class="date child4"
                                                data-column="تاریخ  ">{{ explode(" " , $product->sell_time)[0] }}</td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="tab tab-2">
                                <img class="tabs-image" src="client/assets/icons/emptysells.svg">
                                <p>
                                    شما هنوز فروشی انجام نداده اید
                                </p>
                            </div>
                        @endif

                        @if($client->seller->products->count() > 0)
                            <div class="tab ">
                                <div class="staggered-gallery">

                                    <div class="masonry">
                                        @each('components.brick' , $client->seller->products , 'product')
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="tab ">
                                <img class="tabs-image" src="client/assets/icons/emptyfile.svg">
                                <p>
                                    شما هنوز فایلی آپلود نکرده اید
                                </p>

                            </div>
                        @endif

                        @if($client->products->count() == 0)
                            <div class="tab">
                                <img class="tabs-image" src="client/assets/icons/notsell.svg">
                                <p>
                                    شما هنوز خریدی انجام نداده اید
                                </p>
                            </div>
                        @else
                            <div class="tab tab-1">

                                <table>
                                    <thead>
                                    <tr class="tr">
                                        <th class="child1">نام عکس</th>
                                        <th class="child2">عکاس</th>
                                        <th class="child3">تاریخ خرید</th>
                                        <th class="child4">دانلود</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @each('components.download' , $client->products , 'download')


                                    </tbody>
                                </table>
                            </div>
                        @endif


                        @if(count($transactions) > 0)
                            <div class="tab tab-2">

                                <table>
                                    <thead>
                                    <tr class="tr">
                                        <th class="child1">توضیح</th>

                                        <th class="child2">نوع</th>
                                        <th class="child3"> وضعیت</th>
                                        <th class="child4">تاریخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($transactions as $transaction)

                                        <tr class="tr">
                                            <td class="child1" data-column="توضیح  ">
                                                @if(isset($transaction->is_plan))
                                                    @if($transaction->is_plan)
                                                         خرید گلد کارت #{{ $transaction->product_id  }}
                                                    @else
                                                        خرید {{ \App\Models\Product::query()->find($transaction->product_id)->name }}
                                                    @endif

                                                @endif
                                            </td>
                                            <td class="child2" data-column=" موفق ">
                                                @if(isset($transaction->is_plan))
                                                    @if($transaction->is_plan)
                                                    خرید گلد کارت
                                                    @else
                                                        خرید محصول
                                                    @endif
                                                @endif
                                            </td>

                                            @if(isset($transaction->is_plan))
                                                @if($transaction->status)
                                                    <td class="success child3" data-column=" وضعیت ">
                                                        موفق
                                                    </td>
                                                @else
                                                    <td class="notaccsept child3" data-column=" وضعیت ">
                                                        ناموفق
                                                    </td>
                                                @endif
                                            @endif
                                            <td class="date child4" data-column="تاریخ  ">{{ $transaction->shamsi_date }}</td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        @else
                            <div class="tab">
                                <img class="tabs-image" src="client/assets/icons/notlike.svg">
                                <p>
                                    شما هنوز تراکنشی انجام ندادید
                                </p>


                            </div>
                        @endif



                        @if($client->favorites->count() == 0)
                            <div class="tab">
                                <img class="tabs-image" src="client/assets//icons/notbuy.svg">
                                <p>
                                    شما هنوز فایلی به علاقه مندی ها افزوده نکرده اید
                                </p>
                            </div>
                        @else
                            <div class="tab tab-3">

                                <table>
                                    <thead>
                                    <tr class="tr">
                                        <th class="main-item">نام فایل</th>

                                        <th>تاریخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @each('components.favorite' , $client->favorites , 'favorite')


                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>


                </div>


            </div>

        </div>

    </section>

@endsection