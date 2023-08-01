@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="container">
            <div class="profile second-profile">
                <div style="margin-bottom: 0;" class="profile ">
                    <div class="image-box">
                        <img src="{{get_image($client->avatar)}}">
                    </div>
                    <h1>
                        {{$client->name}}
                    </h1>
                    <p>
                        {{ $client->description  }}
                    </p>
                </div>

                <div class="staggered-gallery space">
                    <div class="masonry">
                        @each('components.brick' , $client->products , 'product')

                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection