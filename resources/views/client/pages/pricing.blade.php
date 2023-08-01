@extends('client.index')


@section('content')

    <section id="sec2">
        <div class="container second-container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <h1>
                        {{ setting('page.pricing_title') }}
                    </h1>
                    <p>
                        {{ setting('page.pricing_content') }}
                    </p>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-12">
                    <div class="image-row">
                        <div class="img-1">
                            <img src="client/assets//photo/samp-3.png ">
                            <img class="overlay" src="client/assets//photo/fade.png">
                        </div>
                        <div class="img-2">

                            <img src="client/assets//photo/samp-1.png">
                            <img class="overlay" src="client/assets//photo/fade.png">
                        </div>
                        <div class="img-3">


                            <img src="client/assets//photo/samp-2.png ">
                            <img class="overlay" src="client/assets//photo/fade.png">
                        </div>

                    </div>

                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="tab-frame pricing">

                        @foreach($goldcards as $key => $value)

                            <input type="radio" {{ $goldcards->first() == $value ? 'checked' : "" }} name="tab" id="tab{{$key}}">
                            <label class="pricing-details" for="tab{{ $key }}">
                                {{ $key }} ماهه
                            </label>

                        @endforeach


                        <div class="tab-content">

                            @foreach($goldcards as $key => $value)
                                <div class="tab ">
                                    <div class="row">
                                        @for($i = 0 ;$i < $value->count() ; $i++)
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="(() => { document.location = '{{ route('pay_plan' , $value[$i]['id']) }}' })()">
                                                <div class="pricing-item">
                                                    <h2>
                                                        گلد کارت {{ $i + 1 }}#
                                                    </h2>
                                                    <p>
                                                        دانلود {{ $value[$i]["pic_count"] }} تصویر
                                                    </p>
                                                    <h3>
                                                        {{ fa_number($value[$i]["price"]) }}
                                                    </h3>
                                                    <p>
                                                        تومان
                                                    </p>

                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>


            </div>


        </div>

    </section>

@endsection