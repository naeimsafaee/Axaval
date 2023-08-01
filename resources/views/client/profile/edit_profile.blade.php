@extends('client.index')


@section('content')

    <section id="sec2">
        <div class="container">
            <div class="profile edit">
                <div class="image-box">
                    <img src="client/assets/photo/avatar.png">
                </div>
                <div style="margin-bottom: 35px;" class="edit-profile">
                    <img src="assets/icons/black-upload.svg">
                    بارگزاری عکس
                </div>



                <div class="input-item ">
                    <div class="text-item">
                        <input  type="text" placeholder="نام و نام خانوادگی">
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
                <div class="form-item disabled">
                    <div class="disabled-alarm">
                        <img src="assets/icons/not-allowed.svg">

                        غیر قابل ویرایش


                    </div>
                    <input disabled type="text" placeholder="۹۹۱۱۱۹۵۹۲۹">

                </div>
                <div class="withdraw change-submit">
                    <img src="assets/icons/tick.svg">
                    تغییر تغییرات
                </div>




            </div>

        </div>

    </section>

@endsection