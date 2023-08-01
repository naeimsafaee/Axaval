@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="block">
            <div class="login-form">
                <div class="login-item">
                    <img src="client/assets/icons/basket.svg">

                </div>
                <h1>
                    درخواست حساب فروشندگان  </h1>
                <p>
                    احراز هویت  </p>

                <!-- <form action=""> -->

                <div class="dropdown">

                    <div class="select">
                        <span>
                            اسکن کارت ملی
                        </span>
                        <span class="choose-file">
                            انتخاب از فایل
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 ">
                        <div class="form-item international-code">
                            <input type="text" placeholder="   ۰۲۱"/>

                        </div>

                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                        <div class="input-item ">
                            <div class="text-item">
                                <input type="text" placeholder="  شماره ثابت"/>
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
                <div class="input-item ">
                    <div class="text-item">
                        <input type="text" placeholder="   تلفن همراه"/>
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

                <!-- </form> -->



                <div class="withdraw change-submit max-width">
                    <img src="client/assets/icons/continue.svg">
                    ادامه


                </div>
            </div>

        </div>


    </section>

@endsection