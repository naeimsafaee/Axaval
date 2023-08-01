@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="container second-container">
            <div class="main-row">
                <div class="product-image">
                    <img src="{{ get_image($blog->image) }}">

                </div>
                <h1>
                    {{ $blog->title }}
                </h1>
                <p>
                    {{ $blog->content }}
                </p>
            </div>

        </div>

    </section>

@endsection