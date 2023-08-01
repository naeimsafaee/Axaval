@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="container second-container">
            <div class="error-massage">
                <div class="big-circle">
                    <img src="{{ asset('client/assets/icons/redclose.svg') }}">

                </div>

                <p>
                    مشلکی در پرداخت بود
                </p>
                <div class="product-details">
                    <a class="withdraw ">
                        <img src="{{ asset('client/assets/icons/pluse.svg') }}">
                        پرداخت مجدد
                    </a>
                </div>
            </div>



        </div>

    </section>

@endsection