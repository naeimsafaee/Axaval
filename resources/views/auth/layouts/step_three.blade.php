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
                    درخواست حساب فروشندگان  </h1>
                <p>
                    اطلاعات بانکی  </p>

                <!-- <form> -->
                <form id="main_form" action="{{ route('set_step_three') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="hesab"
                           id="hesab">

                    <input type="hidden" name="card_number"
                           id="card_number">

                    <input type="hidden" name="shaba"
                           id="shaba">

                </form>

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('hesab').value = this.value })()" required type="text" placeholder="   شماره حساب"/>
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
                @error('hesab')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('card_number').value = this.value })()" required type="text" placeholder="شماره کارت"/>
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
                @error('card_number')
                <span class="invalid-feedback" role="alert" style="display: block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input onkeyup="(() => { document.getElementById('shaba').value = this.value })()" required type="text" placeholder="شماره شبا"/>
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
                @error('shaba')
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
