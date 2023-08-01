@extends('client.index')


@section('content')

    <section id="sec2">
        <div class="container second-container">
            <h1>
                تماس با ما
            </h1>
            <p>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری
                را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این
                صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد
                وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی
                اساسا مورد استفاده قرار گیرد.
            </p>
            <form  method="POST" action="{{route('ContactUsForm')}}">
                @csrf
            <div class="profile edit">
                <div class="input-item ">
                    <div class="text-item">
                        <input type="text" name="name" placeholder="نام شما" required>
                    </div>
                    <button class="clear">
                        <svg viewBox="0 0 24 24">
                            <path class="line" d="M2 2L22 22"/>
                            <path class="long" d="M9 15L20 4"/>
                            <path class="arrow" d="M13 11V7"/>
                            <path class="arrow" d="M17 11H13"/>
                        </svg>
                    </button>
                </div>
                <div class="input-item ">
                    <div class="text-item">
                        <input type="text" name="title" placeholder="عنوان درخواست" required>
                    </div>
                    <button class="clear">
                        <svg viewBox="0 0 24 24">
                            <path class="line" d="M2 2L22 22"/>
                            <path class="long" d="M9 15L20 4"/>
                            <path class="arrow" d="M13 11V7"/>
                            <path class="arrow" d="M17 11H13"/>
                        </svg>
                    </button>
                </div>


                <div class="form-item">
                    <textarea type="text"name="description" placeholder=" توضیح" required></textarea>
                </div>
                <button class="submitbutton " onclick="(() => { window.location = `{{ env('APP_URL') }}` })()">
                    <span class="default"><img src="client/assets//icons/tick.svg">
                        ارسال پیام
                    </span>
                    <span class="success">پیام ارسال شد</span>
                    <div class="left"></div>
                    <div class="right"></div>
                </button>
            </div>
            </form>



        </div>

    </section>

@endsection