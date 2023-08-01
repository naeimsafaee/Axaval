@extends('client.index')


@section('content')

    <section id="sec2">
        <div class="container">
            <div class="profile edit">
                @if(auth()->guard('clients')->user()->avatar)
                    <div class="image-box">
                        <img src="{{ get_image(auth()->guard('clients')->user()->avatar) }}">
                    </div>
                @else
                    <div class="image-box">
                        <img src="{{ asset('client/assets/photo/avatar.png') }}">
                    </div>
                @endif
                <div id="uploadAvaterEdit"></div>
                <div style="margin-bottom: 35px;" class="edit-profile">
                    <img src="{{ asset('client/assets//icons/black-upload.svg') }}">

                    <form id="main_form" action="{{ route('edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="myFile" style="margin: 0">بارگزاری عکس</label>
                        <input type="file" id="myFile" style="visibility:hidden;display: none" name="avatar" onchange="handlePreviewAvater(this)">
                        <input value="{{ auth()->guard('clients')->user()->name }}" type="hidden" name="name"
                               id="input_name">
                        <input value="{{ auth()->guard('clients')->user()->description }}" type="hidden" name="description"
                               id="input_description">

                    </form>
                </div>
                @error('avatar')
                <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror

                <div class="input-item ">
                    <div class="text-item">
                        <input value="{{ auth()->guard('clients')->user()->name }}"
                               onkeyup="(() => { document.getElementById('input_name').value = this.value })()"
                               type="text" name="name" placeholder="نام و نام خانوادگی">
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
                        <input value="{{ auth()->guard('clients')->user()->description }}"
                               onkeyup="(() => { document.getElementById('input_description').value = this.value })()"
                               type="text" name="name" placeholder="توضیحات">
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
                @error('name')
                <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
                <div class="form-item disabled">
                    <div class="disabled-alarm">
                        <img src="{{ asset('client/assets//icons/not-allowed.svg') }}">

                        غیر قابل ویرایش


                    </div>
                    <input disabled type="text" placeholder="۹۹۱۱۱۹۵۹۲۹"
                           value="{{ auth()->guard('clients')->user()->phone }}">

                </div>
                <div class="withdraw change-submit"
                     onclick="(() => { document.getElementById('main_form').submit() })()">
                    <img src="{{ asset('client/assets//icons/tick.svg') }}">
                    ثبت تغییرات
                </div>


            </div>

        </div>

    </section>

    <script>

        function handlePreviewAvater(input){

            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function(e) {
        
                    $("#uploadAvaterEdit").html(`
                    
                        <div class="image-box">
                            <img src="${e.target.result}">
                        </div>
                    
                    `);
        
                }
        
                reader.readAsDataURL(input.files[0]);
            }

        }

    </script>

@endsection