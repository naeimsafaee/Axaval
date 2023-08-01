@extends('auth.index')

@section('background')

    <div class="background">
        <img src="client/assets/photo/portrait-concentrated-bearded-man 1-1.png">
    </div>

@endsection

@section('content')

    <section id="sec2">
        <div class="block">
            <div class="login-form">
                <div class="login-item">
                    <img src="client/assets/icons/cellphone.svg">

                </div>
                <h1>
                    ورود به حساب کاربری
                </h1>
                <p>
                    شماره موبایل خود را وارد نمایید
                </p>
                <!-- <form> -->
                <form method="post" action="{{ route('register') }}" id="main_form">
                    @csrf
                    <div class="input-item ">
                        <div class="text-item">
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="شماره موبایل">
                        </div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button class="clear">
                            <svg viewBox="0 0 24 24">
                                <path class="line" d="M2 2L22 22"/>
                                <path class="long" d="M9 15L20 4"/>
                                <path class="arrow" d="M13 11V7"/>
                                <path class="arrow" d="M17 11H13"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- </form> -->


                <div class="withdraw change-submit max-width"
                     onclick="(() => { document.getElementById('main_form').submit() })()">
                    <img src="client/assets/icons/continue.svg">
                    ادامه
                </div>
            </div>

        </div>


    </section>

@endsection