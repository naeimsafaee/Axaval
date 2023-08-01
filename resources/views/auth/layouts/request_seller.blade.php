@extends('auth.index')

@section('background')

    <div class="background">
        <img src="client/assets/photo/portrait-concentrated-bearded-man 1.png">
    </div>

@endsection

@section('content')

    <section id="sec2">
        <div class="block">
            <div class="login-form">
                <div class="login-item">
                    <img src="client/assets/icons/basket.svg">

                </div>
                <h1>
                    درخواست حساب فروشندگان </h1>
                <p>
                    احراز هویت </p>

                <!-- <form action=""> -->

                <div class="dropdown">

                    <div class="select">
                        <span>
                            اسکن کارت ملی
                        </span>

                        <form id="main_form" action="{{ route('set_request_seller') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="myFile" style="margin: -10px">
                                <span class="choose-file">انتخاب از فایل</span>
                            </label>

                            <input type="file" id="myFile" style="visibility:hidden;display: none" name="melli_card_scan">

                            <input type="hidden" name="phone"
                                   id="input_mobile">

                            <input type="hidden" name="home_phone"
                                   id="input_phone">

                            <input type="hidden" name="email"
                                   id="input_email">

                        </form>
                    </div>

                </div>
                @error('melli_card_scan')
                    <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 ">
                        <div class="form-item international-code">
                            <input id="prefix_home_phone"
                                   onkeyup="(() => { document.getElementById('input_phone').value = this.value + document.getElementById('static_home_phone').value })()"
                                   type="text" placeholder="   ۰۲۱" required/>

                        </div>

                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-9">
                        <div class="input-item ">
                            <div class="text-item">
                                <input type="text"
                                       onkeyup="(() => { document.getElementById('input_phone').value = document.getElementById('prefix_home_phone').value + this.value })()"
                                       id="static_home_phone" placeholder="  شماره ثابت" required/>
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
                        @error('home_phone')
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="input-item ">
                    <div class="text-item">
                        <input type="text"
                               onkeyup="(() => { document.getElementById('input_mobile').value = this.value })()"
                               placeholder="   تلفن همراه" required/>
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
                @error('phone')
                    <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input type="text"
                               onkeyup="(() => { document.getElementById('input_email').value = this.value })()"
                               placeholder="ایمیل" required/>
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
                @error('email')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror

                <!-- </form> -->


                <div onclick="(() => { document.getElementById('main_form').submit() })()" class="withdraw change-submit max-width">
                    <img src="client/assets/icons/continue.svg">
                    ادامه


                </div>
            </div>

        </div>


    </section>

@endsection