@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="container second-container">
            <div class="error-massage">
                <div id="big-circle" class="big-circle">
                    <img src="{{ asset('client/assets/icons/green-check.svg') }}">

                </div>

                <p>
                    پرداخت با موفقیت انجام شد
                </p>
                <div class="product-details">
                    <a class="withdraw " href="{{ $redirect }}">
                        <img src="{{ asset('client/assets/icons/pluse.svg') }}">
                        بازگشت به صفحه محصول

                    </a>
                </div>
            </div>



        </div>

    </section>

@endsection