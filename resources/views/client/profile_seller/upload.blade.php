@extends('client.index')

@section('styles')
    <link href="{{asset ('client/assets/css/dropzone.css')}}" rel="stylesheet">
@endsection
@section('content')

    <section id="sec2">
        <div class="error-message" id="error-message-upload" style="transform: translateY(-250%);">
            عکس با موفقیت ثبت شد
        </div>
        <div class="container">
            <div class="profile edit upload-form">
                <h1>
                    آپلود فایل
                </h1>


                <div id="firstPageUpload" class="profile edit" style="width: 100%">


                    <div class="upload-box dropzone" id="dropzone">
                        {{--                    <div class="upload-box">--}}
                        {{--<div class="upload-image">
                            <img src="client/assets/photo/avatar.png">


                        </div>
                        <p class="progress-text">
                            فایل با موفقیت بارگزاری شد
                        </p>--}}

                        {{--                    </div>--}}

                        <div class="uploadFirsShow">

                            <label for="uploadImageInput">

                                <div class="upload">
                                    <svg class="circle" viewBox="0 0 164 164">
                                        <circle cx="82" cy="82" r="80"></circle>
                                        <circle class="active" cx="82" cy="82" r="80"></circle>
                                    </svg>

                                    <svg class="image" viewBox="0 0 60 60">
                                        <rect fill="currentColor" x="0" y="0" width="60" height="60"
                                              rx="11.9999993"></rect>
                                        <circle fill="#FFFFFF" cx="15" cy="15" r="5"></circle>
                                        <path d="M50,54 L10,54 C7.790861,54 6,52.209139 6,50 L6,44.2867962 C6,44.0993765 6.05266944,43.9157289 6.1520017,43.7567973 L12.6080068,33.4271891 C12.9299296,32.9121126 13.3649277,32.4771145 13.8800042,32.1551917 C15.7533504,30.9843504 18.2211519,31.553843 19.3919932,33.4271891 L26,44 L36.3752674,21.7672841 C36.7726106,20.9158345 37.4570086,20.2314365 38.3084581,19.8340934 C40.3103427,18.8998806 42.6905198,19.7653995 43.6247326,21.7672841 L53.9061831,43.7989639 C53.9679765,43.9313783 54,44.0757261 54,44.2218493 L54,50 C54,52.209139 52.209139,54 50,54 Z"
                                              fill="#FFFFFF"></path>
                                    </svg>

                                </div>
                            </label>

                            <input type="file" class="imageUploadInputFile" hidden id="uploadImageInput"
                                   name="uploadImageInput" onchange="handleChangeInput(this,0)"/>
                        </div>


                    </div>


                    {{--<div class="upload-box">
                        <div class="upload-image">
                            <img src="assets/photo/cofe.jpg">


                        </div>
                        <p class="progress-text">
                            فایل با موفقیت بارگزاری شد
                        </p>

                    </div>--}}






                    {{--                <form method="post" action="{{route('upload')}}" class="upload-box dropzone" id="dropzone">--}}

                    {{--                </form>--}}


                    {{--<div id="upload-box" class="upload-box">
                        <div class="upload">

                            <svg class="circle" viewBox="0 0 164 164">
                                <circle cx="82" cy="82" r="80"></circle>
                                <circle class="active" cx="82" cy="82" r="80"></circle>
                            </svg>

                            <svg class="image" viewBox="0 0 60 60">
                                <rect fill="currentColor" x="0" y="0" width="60" height="60" rx="11.9999993"></rect>
                                <circle fill="#FFFFFF" cx="15" cy="15" r="5"></circle>
                                <path d="M50,54 L10,54 C7.790861,54 6,52.209139 6,50 L6,44.2867962 C6,44.0993765 6.05266944,43.9157289 6.1520017,43.7567973 L12.6080068,33.4271891 C12.9299296,32.9121126 13.3649277,32.4771145 13.8800042,32.1551917 C15.7533504,30.9843504 18.2211519,31.553843 19.3919932,33.4271891 L26,44 L36.3752674,21.7672841 C36.7726106,20.9158345 37.4570086,20.2314365 38.3084581,19.8340934 C40.3103427,18.8998806 42.6905198,19.7653995 43.6247326,21.7672841 L53.9061831,43.7989639 C53.9679765,43.9313783 54,44.0757261 54,44.2218493 L54,50 C54,52.209139 52.209139,54 50,54 Z"
                                      fill="#FFFFFF"></path>
                            </svg>

                        </div>

                        <p>
                            تصویر رو اینجا بکش رها کن
                        </p>
                    </div>
    --}}
                    <div class="upload-row">

                    </div>
                    <div id="upload-item" class="myfiles-item">

                        سایز دیگه هم داره ؟ اضافه کنید
                    </div>

                    <div class="withdraw change-submit" onclick="GoToNextForm()">
                        <img src="{{asset('client/assets/icons/tick.svg')}}">
                        مرجله بعد

                    </div>

                    <span class="invalid-feedback" id="invalid_imageUpload" role="alert" style="display: none">
                            <strong>لطفا عکس خود را انتخاب کنید! </strong>
                    </span>


                </div>


                {{--                input form--}}


                <div id="uploadFormInput" class="profile edit upload-form" style="display: none">


                    <div class="input-item ">
                        <div class="text-item">
                            <input type="text" class="NameFileUpload" placeholder="نام فایل">
                        </div>
                        <button class="clear">
                            <svg viewBox="0 0 24 24">
                                <path class="line" d="M2 2L22 22"/>
                                <path class="long" d="M9 15L20 4"/>
                                <path class="arrow" d="M13 11V7"/>
                                <path class="arrow" d="M17 11H13"/>
                            </svg>
                        </button>
                        <span class="invalid-feedback" id="invalid_name" role="alert" style="display: none">
                        <strong>لطفا نام را وارد نمایید</strong>
                    </span>
                    </div>

                    <div class="colorfull">

                    <span>
                        طیف رنگی

                    </span>
                        <span>
                        <img src="{{ asset('client/assets/icons/color.svg') }}">

                    </span>
                    </div>
                    <div id="color-details" class="filter-details">

                        <div class="color-paicker">
                            @foreach ($colors as $clr)

                                <div class="color-item" onclick="ToggleColorAdd({{ $clr->id }}) "
                                     style="background: {{ $clr->color_code }};border: 1px solid {{ $clr->color_code }};">

                                    <div style="background: {{ $clr->color_code }};">

                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <span class="invalid-feedback" id="invalid_color" role="alert" style="display: none">
                        <strong>لطفا یک طیف رنگی انتخاب کنید!</strong>
                    </span>
                    </div>

                    <div id="tag-row" class="input-item upload-input filter">
                        <label class="tag-label">
                            حداکثر سه دسته قابل افزودن میباشد
                        </label>
                        <div class="text-item ">
                            <input class="filter" type="text" placeholder="  دسته بندی">

                        </div>
                        <button class="clear ">
                            <svg viewBox="0 0 24 24">
                                <path class="line" d="M2 2L22 22"/>
                                <path class="long" d="M9 15L20 4"/>
                                <path class="arrow" d="M13 11V7"/>
                                <path class="arrow" d="M17 11H13"/>
                            </svg>
                        </button>
                    </div>

                    <div id="filter-details" class="filter-details">
                        <div style="margin-bottom: 30px;">

                            <span>
                                دسته بندی

                            </span>
                            <span>
                                <img src="{{ asset('client/assets/icons/filter.svg') }}">

                            </span>

                        </div>
                        <ul>

                        </ul>


                    </div>

                    <div id="tag" class="tag-row">

                    </div>

                    <div  class="input-item upload-input tag-filter">
                        <label class="tag-item2">
                            سه برچسب با اینتر اضافه کنید
                        </label>
                        <div class="text-item ">
                            <input id="input-value" type="text" placeholder="برچسب ">

                        </div>
                        <button class="clear ">
                            <svg viewBox="0 0 24 24">
                                <path class="line" d="M2 2L22 22"/>
                                <path class="long" d="M9 15L20 4"/>
                                <path class="arrow" d="M13 11V7"/>
                                <path class="arrow" d="M17 11H13"/>
                            </svg>
                        </button>
                    </div>

                    <div id="second-tag-row" class="tag-row">

                    </div>

                    <div class="checklist-row">
                        <p>
                            نوع فایل
                        </p>
                        <label class="container-radio" onclick="(() => { $('#input_div_price').show() })()">پولی
                            <input type="radio" class="priceInputRadio" value="0" checked="checked"
                                   name="file_extension">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container-radio" onclick="(() => { $('#input_div_price').hide() })()">رایگان
                            <input type="radio" class="priceInputRadio" id="priceInputRadio" value="1"
                                   name="file_extension">
                            <span class="checkmark"></span>
                        </label>

                    </div>

                    <div class="input-item second-input-item PriceInputUpload" id="input_div_price">
                        <p>
                            تومان
                        </p>
                        <div class="text-item">
                            <input onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                   class="money" id="price_input_value" type="text" placeholder="مبلغ درخواستی">

                        </div>
                        <button class="clear">
                            <svg viewBox="0 0 24 24">
                                <path class="line" d="M2 2L22 22"/>
                                <path class="long" d="M9 15L20 4"/>
                                <path class="arrow" d="M13 11V7"/>
                                <path class="arrow" d="M17 11H13"/>
                            </svg>
                        </button>


                        <span class="invalid-feedback" id="invalid_price" role="alert" style="display: none">
                            <strong>لطفا مبلغ درخواستی را وارد نمایید!</strong>
                        </span>
                    </div>

                    <div class="checklist-row">
                        <p>جنس فایل</p>
                        <label class="container-radio">عکس
                            <input type="radio" class="radioTypeFileRadio" value="0" checked="checked" name="file_type">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container-radio">الیستریشن
                            <input type="radio" class="radioTypeFileRadio" value="1" name="file_type">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container-radio">وکتور
                            <input type="radio" class="radioTypeFileRadio" value="2" name="file_type">
                            <span class="checkmark"></span>
                        </label>
                    </div>


                    <div class="withdraw change-submit" onclick="upload()">
                        <img src="{{asset('client/assets/icons/tick.svg')}}">
                        انتشار

                    </div>
                    <span id="loading" style="display: none">لطفا صبر کنید!</span>


                </div>


            </div>

        </div>

        <form>
            @csrf
            <input type="hidden" name="categories" value="" id="categories"/>
            <input type="hidden" name="tags" value="" id="tags"/>
            <input type="hidden" name="colors" value="" id="colors"/>
            <input type="hidden" name="is_priced" value="1" id="is_priced"/>
            <input type="hidden" name="file_type" value="{{ config('Constants.FILE_TYPE.PICTURE') }}" id="file_type"/>
        </form>

    </section>

@endsection

@section('optional_footer')
    <script src="{{ asset('client/assets/js/dropzone.js') }}"></script>

    <script>

        // $(document).ready(function(){
        //     $('.imageUploadInputFile').file_upload();
        // })

        var categories = [];

        $(document).ready(function(){

            $(document).on("dragover",".upload-box", function (event) {
                event.preventDefault();
                event.stopPropagation();
                // $(this).addClass('dragging');
                // console.log("1");
            });
    
            // function onDropImage(event,this,num){
            // }
    
            $(document).on("drop",".upload-box", function (event) {
                event.preventDefault();
                event.stopPropagation();
                // $(this).addClass('dragging')
                // console.log(event);
                var inputDropFile = $(this).find(".imageUploadInputFile");

                if(!$(inputDropFile).hasClass("has_image")){

                    var imageFileDrag = event.originalEvent.dataTransfer.files[0];
                    // console.log(imageFileDrag);
        
        
        
                    // console.log(inputDropFile);
        
        
                    $(inputDropFile[0]).prop("files", event.originalEvent.dataTransfer.files);
        
        
                    var findNum = $(inputDropFile).attr("onchange");
                    findNum = findNum.split(",");
                    findNum = findNum[1].split(")");
                    findNum = parseInt(findNum[0]);
        
                    // console.log($(inputDropFile).attr("onchange"));
        
                    // console.log(findNum);
                    handleChangeInput(inputDropFile[0], findNum);

                    $(inputDropFile).addClass("has_image");
    
                }
            });
        })


        let uploadedFiles = [];
        Dropzone.options.dropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 20,
            maxFiles: 1,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            dictDefaultMessage: 'تصویر رو اینجا بکش رها کن',
            dictFallbackMessage: 'خطا',
            dictFallbackText: 'خطا',
            dictFileTooBig: 'حداکثر سایز مجاز ۲۰ مگابایت است',
            dictInvalidFileType: 'این فایل مورد قبول نیست',
            dictResponseError: 'خطا در آپلود فایل',
            dictCancelUpload: 'کنسل کردن آپلود',
            dictUploadCanceled: 'آپلود کنسل شد',
            dictCancelUploadConfirmation: 'مطمئنی میخوای آپلود این فایل رو متوقف کنی؟',
            dictRemoveFile: 'حذف',
            dictRemoveFileConfirmation: 'مطمئنی میخوای این فایل رو حذف کنی؟',
            dictMaxFilesExceeded: 'برای افزودن سایز جدید رو این دکمه سبزه بزن',
            dictFileSizeUnits: {
                mb: 'مگابایت',
                kb: 'کیلوبایت',
                b: 'بایت'
            },
            init: function () {
                this.on("addedfile", function (file) {
                    console.log('file added')
                    let uploadDOM = document.getElementsByClassName('upload')[0]
                    uploadDOM.innerHTML = ''
                    if (!uploadDOM.classList.contains('hasFiles')) {
                        uploadDOM.classList.add('hasFiles')
                    }
                })
                this.on("success", function (upload, response) {
                    console.log(response.data)
                    uploadedFiles.push(response.data.path)
                })
            }
        };
        let ColorArray = Array();

        let tags = Array()
        $('#input-value').keypress(function (e) {
            var key = e.which;
            var value = $(this).val();
            if (key == 13)  // the enter key code
            {
                if (tags.length == 3) {
                    $(".tag-filter").css("border", "1px solid red")
                    $(".tag-item2").css("color", "red")
                    $(this).blur()
                    setTimeout(function () {
                        $(".tag-item2").css("color", "rgba(78, 78, 78, 0.43)")
                        $(".tag-filter").css("border", "1px solid rgba(0, 0, 0, 0.1)")


                    }, 1000)
                    return
                }

                tags.push(value)
                $("#second-tag-row").append(
                    `<div class="tag-item"><img src="{{ asset('client/assets/icons/filter-close.svg') }}">${value}</div>`
                ).hide().fadeIn(300);
                $(this).blur().val('');

                document.getElementById('tags').value = tags.join(",");
            }

            $(".tag-item").click(function () {
                $(this).fadeOut(300, function () {
                    $(this).remove();
                    let index = tags.indexOf($(this).text())
                    if (index != -1) {
                        tags.splice(index, 1)
                        document.getElementById('tags').value = tags.join(",");
                    }
                })
            });


        });


        (function ($) {
            'use strict';
            // Sort us out with the options parameters
            var getAnimOpts = function (a, b, c) {
                    if (!a) {
                        return {duration: 'normal'};
                    }
                    if (!!c) {
                        return {duration: a, easing: b, complete: c};
                    }
                    if (!!b) {
                        return {duration: a, complete: b};
                    }
                    if (typeof a === 'object') {
                        return a;
                    }
                    return {duration: a};
                },
                getUnqueuedOpts = function (opts) {
                    return {
                        queue: false,
                        duration: opts.duration,
                        easing: opts.easing
                    };
                };
            // Declare our new effects
            $.fn.showDown = function (a, b, c) {
                var slideOpts = getAnimOpts(a, b, c), fadeOpts = getUnqueuedOpts(slideOpts);
                $(this).hide().css('opacity', 0).slideDown(slideOpts).animate({opacity: 1}, fadeOpts);
            };
            $.fn.hideUp = function (a, b, c) {
                var slideOpts = getAnimOpts(a, b, c), fadeOpts = getUnqueuedOpts(slideOpts);
                $(this).show().css('opacity', 1).slideUp(slideOpts).animate({opacity: 0}, fadeOpts);
            };
        }(jQuery));
        $(document).mouseup(e => {

            if ($('.filter').is(e.target) && $('#filter-details').is(':hidden')) {
                $('#filter-details').showDown(200, 'easeOut');
            } else if (!$('#filter-details').is(e.target) && $('#filter-details').has(e.target).length === 0) {
                $('#filter-details').fadeOut(100)
            }
        });

        let filter_items = [
            @foreach($categories as $category)
                "{{ $category->name }}",
            @endforeach
        ];
        let filter_items_href = [
            @foreach($categories as $category)
                "{{ $category->slug }}",
            @endforeach
        ];

        console.log(filter_items)


        let selected_filter_items = Array()
        $(document).ready(function () {
            initFilterList();
            // console.log(filter_items)
        });


        function initFilterList() {
            let container = $('#filter-details ul')
            container.empty()
            filter_items.forEach(function (filter) {
                if (!selected_filter_items.includes(filter)) {
                    container.append(`<li><a>${filter}</a></li>`)
                }
            })

            $("#filter-details ul li").click((element) => {

                if (selected_filter_items.includes(element.target.innerText)) {
                    return
                }
                if (selected_filter_items.length === 3) {
                    $("#tag-row").css("border", "1px solid red")
                    $(".tag-label").css("color", "red")
                    setTimeout(function () {
                        $(".tag-label").css("color", "rgba(78, 78, 78, 0.43)")
                        $("#tag-row").css("border", "1px solid rgba(0, 0, 0, 0.1)")

                    }, 1000)
                    return
                }


                selected_filter_items.push(element.target.innerText)
                initFilterList()

                $("#tag").append(
                    `<div class="tag-item"><img src="{{ asset('client/assets/icons/filter-close.svg') }}">${element.target.innerText}</div>`
                ).hide().fadeIn(300)

                document.getElementById('categories').value = selected_filter_items.join(",");

                $(".tag-item").click(function (element) {
                    console.log($(this).parent().text())
                    let index = selected_filter_items.indexOf($(this).text())
                    if (index > -1) {
                        selected_filter_items.splice(index, 1)
                        document.getElementById('categories').value = selected_filter_items.join(",");

                    }
                    $(this).fadeOut(300, function () {
                        console.log('fade out done')
                        $(this).remove();
                        initFilterList()
                    })
                });

            });

        }


        function fillPriceInput() {

            var price = $("#priceIn").val();
            $("#is_priced").val(price);
            var priceIn = $("#is_priced").val();
            console.log(priceIn);

        }

        jQuery('.color-item').click(function (event) {

            // $(this).toggleClass('active');


            var ColorIn = $("#colors").val();
            var ColorId = $(this).attr("name")
            ColorId = parseInt($(this).attr("name"))
            // $("#colors").val(ColorId);

            if (ColorArray.indexOf(ColorId) > -1) {
                var index = ColorArray.indexOf(ColorId);

                ColorArray.splice(index, 1);
            } else {
                ColorArray.push(ColorId);
                ColorArray = [...new Set(ColorArray)];
            }
            console.log("Hello")


            // console.log(ColorArray);
            // console.log(ColorIn);


            // event.preventDefault();
        });

    </script>

    <script>
        $('.color-item').click(function (event) {

            $(this).toggleClass('active');

            event.preventDefault();
        });
    </script>

    <script src="{{ asset('client/assets/js/upload-form.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
            integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
            crossorigin="anonymous"></script>

    <script>
        var loading = false;

        function upload() {

            if (!validationInput()) {
                console.log('va;df');
                return;
            }

            console.log('start');

            var imageArray = $('input[type="file"]');
            var imageFileArray = [];


            // console.log(imageFileArray);

            var fd = new FormData();

            for (var i = 0; i < imageArray.length; i++) {
                console.log(imageArray[i].files[0]);
                imageFileArray.push(imageArray[i].files[0])
                fd.append("images[]", imageArray[i].files[0]);
            }

            fd.append("name", $('.NameFileUpload').val());
            for (let i = 0; i < ArrayColor.length; i++) {
                fd.append("colors[]", ArrayColor[i]);
            }

            for (let i = 0; i < selected_filter_items.length; i++) {
                fd.append("category_id[]", selected_filter_items[i]);
            }

            for (let i = 0; i < tags.length; i++) {
                fd.append("tags[]", tags[i]);
            }
            // fd.append("colors[]" , ArrayColor );
            fd.append("is_free", $("#priceInputRadio").is(":checked"));
            fd.append("price", $("#price_input_value").val());
            fd.append("type", 0);




            // let posted_array = {};
            // posted_array.images = imageFileArray;
            // posted_array.name = $('.NameFileUpload').val();
            // posted_array.colors = ArrayColor;
            // posted_array.is_free = $("#priceInputRadio").is(":checked");
            // posted_array.price = $("#price_input_value").val();

            console.log(fd);


            const url = "{{ route('set_upload') }}";
            console.log(url);

            document.getElementById("loading").style.display = "block";
            if(loading)
                return;
            loading = true;

            axios({
                method: 'POST',
                url: url,
                header: {
                    "Content-Type": "multipart/form-data",
                },
                data: fd,
            }).then(function (response) {
                // handle success
                console.log(response);
                $("#error-message-upload").css("transform", "translateY(0%)");
                $("#uploadFormInput").hide();

                setTimeout(function () {
                    $("#error-message-upload").css("transform", "translateY(-250%)");
                    window.location = "{{ route('profile') }}";
                }, 3000)
            });

            // console.log(res);


        }

    </script>

@endsection
