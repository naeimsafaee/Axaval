@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="container">
            <div class="profile">
                @if($client->avatar)
                    <div class="image-box">
                        <img src="{{ get_image($client->avatar) }}">
                    </div>
                @else
                    <div class="image-box">
                        <img src="client/assets/photo/avatar.png">
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
                <div class="line">

                </div>
                <div class="tab-frame">

                    <input type="radio" checked name="tab" id="tab1">
                    <label for="tab1">
                        <div class="green-circle">

                        </div>
                        خرید های من
                    </label>

                    <input type="radio" name="tab" id="tab2">
                    <label for="tab2">
                        <div class="green-circle">

                        </div>
                        تراکنش ها
                    </label>

                    <input type="radio" name="tab" id="tab3">
                    <label for="tab3">
                        <div class="green-circle">

                        </div>
                        علاقه مندی ها
                    </label>
                    <div class="tab-content">
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

                        @if($client->transactions->count() > 0)
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

                                    @foreach($client->transactions as $transaction)
                                        <tr class="tr">
                                            <td class="child1" data-column="توضیح  ">{{ $transaction->is_plan ? 'خرید گلدکارت ' . $transaction->product->name : 'خرید محصول' }}</td>
                                            <td class="child2" data-column=" موفق ">خرید</td>
                                            <td class="{{ $transaction->paid ? 'success' : 'notaccsept' }} child3" data-column=" وضعیت ">موفق</td>
                                            <td class="date child4" data-column="تاریخ  ">{{ $transaction->shamsi_date }}</td>

                                        </tr>
                                    @endforeach

                                    {{--<tr class="tr">
                                        <td class="child1" data-column="توضیح  ">خرید گلد کارت ۸۰ تایی</td>

                                        <td class="child2" data-column=" موفق ">دریافت وجه</td>
                                        <td class="wait child3" data-column=" وضعیت ">در حال برسی</td>
                                        <td class="date child4" data-column="تاریخ  ">۱۶ فروردین ۹۹</td>

                                    </tr>--}}
                                    {{--<tr class="tr">
                                        <td class="child1" data-column="توضیح  ">خرید گلد کارت ۸۰ تایی</td>
                                        <td class="child2" data-column=" موفق ">دریافت وجه</td>
                                        <td class="success child3" data-column=" وضعیت ">موفق</td>
                                        <td class="date child4" data-column="تاریخ  ">۱۶ فروردین ۹۹</td>

                                    </tr>--}}
                                   {{-- <tr class="tr">
                                        <td class="child1" data-column="توضیح  ">خرید گلد کارت ۸۰ تایی</td>
                                        <td class="child2" data-column=" موفق ">دریافت وجه</td>
                                        <td class="notaccsept child3" data-column=" وضعیت ">رد شد</td>
                                        <td class="date child4 " data-column="تاریخ  ">۱۶ فروردین ۹۹</td>
                                    </tr>
                                    <tr class="tr">
                                        <td class="child1" data-column="توضیح  ">خرید گلد کارت ۸۰ تایی</td>
                                        <td class="child2" data-column=" موفق ">خرید</td>
                                        <td class="notaccsept child3" data-column=" وضعیت ">ناموفق</td>
                                        <td class="date child4" data-column="تاریخ  ">۱۶ فروردین ۹۹</td>

                                    </tr>
                                    <tr class="tr">
                                        <td class="child1" data-column="توضیح  ">خرید گلد کارت ۸۰ تایی</td>
                                        <td class="child2" data-column=" موفق ">خرید</td>
                                        <td class="success child3" data-column=" وضعیت ">موفق</td>
                                        <td class="date child4" data-column="تاریخ  ">۱۶ فروردین ۹۹</td>

                                    </tr>--}}


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