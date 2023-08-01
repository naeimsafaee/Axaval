@extends('client.index')


@section('content')


    <section id="sec2">
        @if($result==1)
            <div class="error-message" id="error-message" style="transform: translateY(0%);">
                درخواست شما موفقیت ثبت شد
            </div>
        @endif

        @if($result==0)
            <div class="error-message error-2" id="error-message" style="transform: translateY(0%);">
                مبلغ اشتباهه
            </div>
        @endif
        <div class="container">
            <div class="profile edit">
                <img src="{{asset('client/assets//icons/profileedit.svg')}}">
                <h1>
                    درخواست وجه
                </h1>
                <div class="blance">
                    موجودی حساب شما
                </div>
                <h5 class="balence-value">
                    {{ $client->seller->wallet }} هزار تومان

                </h5>


                <form id="req_money" method="POST" action="{{route('request_money_submit')}}">
                    @csrf
                    <div class="input-item second-input-item">
                        <p>
                            تومان
                        </p>
                        <div class="text-item">
                            <input required
                                   onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                   class="money" type="text" placeholder="مبلغ درخواستی" name="price" id="price">

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

                    <div class="withdraw change-submit" onclick="submit_form()">
                        <img src="{{asset('client/assets//icons/tick.svg')}}">
                        تغییر تغییرات
                    </div>
                </form>
                <script>
                    function submit_form() {
                        if ($("#price").val().length > 0)
                            document.getElementById('req_money').submit();
                    }
                </script>


            </div>

        </div>

    </section>
    <script src="{{asset('client/assets/js/error.js')}}"></script>
@endsection