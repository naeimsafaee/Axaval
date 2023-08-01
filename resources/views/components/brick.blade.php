<div class="brick">
    <a href="{{ route('single_product' ,[ $product["slug"] , $product->id ]) }}">
        <img class="overlay" src="{{asset('client/assets/photo/fade.png')}}">

        <img src="{{get_image($product->files->first()->thumbnail)}}">
    </a>
</div>