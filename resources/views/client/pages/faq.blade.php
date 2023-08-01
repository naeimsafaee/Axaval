@extends('client.index')


@section('content')

    <section id="sec2">
        <div class="container second-container">
            <h1>
                {{ setting('page.faq_title') }}
            </h1>
            <p>
                {{ setting('page.faq_content') }}
            </p>

            @each('components.faq' , $faqs , 'faq')

        </div>

    </section>

@endsection

@section('optional_footer')

    <script>
        $(".qustion-items").click(function(){

            var self = $(this);

            options =$('.second-container');
            for (let i = 0; i < options.length ; i++) {
                options[i].classList.remove("show_p");
            }
            self.toggleClass("show_p");

        });
    </script>

@endsection