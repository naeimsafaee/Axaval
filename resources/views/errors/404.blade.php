@extends('client.index')
@section('content')

    <section id="sec2">
        <div class="container second-container">
            <div class="error-massage">
                <h1 >
                    404
                </h1>
                <p>
                    {{ setting('page.404') }}
                </p>
            </div>



        </div>

    </section>

@endsection