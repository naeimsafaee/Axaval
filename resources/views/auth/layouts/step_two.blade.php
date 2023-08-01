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
                <form id="main_form" action="{{ route('set_step_two') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="town_id"
                           id="town_id">

                    <input type="hidden" name="city_id"
                           id="city_id">

                    <input type="hidden" name="address"
                           id="address">

                    <input type="hidden" name="postal_code"
                           id="postal_code">

                </form>

                <div class="dropdown">
                    <div class="select">
                        <span>استان</span>
                        <img src="client/assets/icons/bottom.svg">
                    </div>

                    <ul class="dropdown-menu">
                        @foreach(\App\Models\Town::all() as $town)
                            <li onclick="(() => { document.getElementById('town_id').value = {{ $town->id }} })()" id="tehran">{{ $town->name }}</li>
                        @endforeach
                    </ul>
                </div>
                @error('town_id')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="dropdown">
                    <div class="select">
                        <span>شهر</span>
                        <img src="client/assets/icons/bottom.svg">

                    </div>

                    <ul class="dropdown-menu">
                        @foreach(\App\Models\City::all() as $city)
                            <li onclick="(() => { document.getElementById('city_id').value = {{ $city->id }} })()" id="tehran">{{ $city->name }}</li>
                        @endforeach

                    </ul>
                </div>
                @error('city_id')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('address').value = this.value })()" required type="text" placeholder="   آدرس"/>
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
                @error('address')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('postal_code').value = this.value })()" required type="text" placeholder="  کد پستی"/>
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
                @error('postal_code')
                    <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{--<div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
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

            </div>--}}


            <!-- </form> -->


                <div onclick="(() => { document.getElementById('main_form').submit() })()" class="withdraw change-submit max-width">
                    <img src="client/assets/icons/continue.svg">
                    ادامه


                </div>
            </div>

        </div>


    </section>

@endsection

@section('optional_footer')

    <script src="client/assets/js/drop-down.js"></script>

@endsection