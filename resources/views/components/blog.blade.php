
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
    <a href="{{ route('singleBlog' , $blog->slug) }}">
        <div class="blog-item">
            <div class="blog-image">
                <img src="{{ get_image($blog->image) }}">

            </div>
            <h5>
                {{ $blog->title }}
            </h5>
            <p>
                {{ $blog->short_desc }}
            </p>
            <p class="blog-date">
                {{ fa_number($blog->shamsi_date) }}
            </p>
            <div class="product-details">
                <div class="withdraw ">
                    <img src="client/assets//icons/pluse.svg">
                    ادامه متن

                </div>
            </div>


        </div>
    </a>
</div>