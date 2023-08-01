@extends('client.index')


@section('content')

    <section id="sec2">
        <div class="container second-container">
            <h1>
                {{ setting('page.AboutUS_title') }}
            </h1>
            <p>
                {{ setting('page.AboutUS_content') }}
            </p>

        </div>

    </section>

@endsection

