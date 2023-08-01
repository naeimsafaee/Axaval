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

                <!-- <form> -->

                <form id="main_form" action="{{ route('set_step_one') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="name"
                           id="full_name">

                    <input type="hidden" name="birthdate"
                           id="birthdate">

                    <input type="hidden" name="shenasname"
                           id="shenasname">

                    <input type="hidden" name="melli_code"
                           id="melli_code">

                    <input type="hidden" name="gender"
                           id="gender" value="مرد">

                    <input type="hidden" name="email_verify"
                           id="email_verify">
                </form>

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('full_name').value = this.value })()"
                               type="text" required placeholder="نام و نام خانوادگی"/>
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
                @error('name')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('birthdate').value = this.value })()"
                               type="text" required placeholder="تاریخ تولد"/>
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
                @error('birthdate')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('shenasname').value = this.value })()" required
                               type="text" placeholder=" شماره شناسنامه">
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
                @error('shenasname')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('melli_code').value = this.value })()" required
                               type="text" placeholder="  کد ملی">
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
                @error('melli_code')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('email_verify').value = this.value })()" required
                               type="text" placeholder="کد تایید ایمیل">
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
                @error('email_verify')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="checklist-row">
                    <p>
                        جنسیت
                    </p>
                    <label class="container-radio" onclick="(() => { document.getElementById('gender').value = 'مرد' })()">مرد
                        <input type="radio" checked="checked" name="file_extension">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container-radio" onclick="(() => { document.getElementById('gender').value = 'زن' })()">زن
                        <input type="radio" name="file_extension">
                        <span class="checkmark"></span>
                    </label>


                </div>

                @error('gender')
                    <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <!-- </form> -->


                <div onclick="(() => { document.getElementById('main_form').submit() })()"
                     class="withdraw change-submit max-width">
                    <img src="client/assets/icons/continue.svg">
                    ادامه


                </div>
            </div>

        </div>


    </section>

@endsection