@extends('client.index')

@section('content')

    <section id="sec2">
        <div class="container second-container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <h1>
                        {{ setting('page.blog_title') }}
                    </h1>
                    <p>
                        {{ setting('page.blog_content') }}
                    </p>
                </div>

                @each('components.blog' , $blogs->items() , 'blog')

                @if($total_page > 1)

                    <div class="col-lg-12 col-md-12 col-sm-12 ">

                        <div class="panigation">

                            <div class=" refrence">
                                صفحه {{ fa_number($current_page) }} از {{ fa_number($total_page) }}
                            </div>

                            @for($i = 1; $i <= $total_page ; $i++)
                                <a href="?page={{$i}}" class="Ellipse {{ $i == $current_page ? 'active' : '' }}">
                                    {{ fa_number($i) }}
                                </a>
                            @endfor


                        </div>
                    </div>

                @endif


            </div>


        </div>

    </section>


@endsection