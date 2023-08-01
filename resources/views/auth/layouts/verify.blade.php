@extends('auth.index')

@section('background')
    <div class="background">
        <img src="client/assets/photo/portrait-concentrated-bearded-man 3.png">
    </div>
@endsection

@section('content')

    <section id="sec2">
        <div class="block">
            <div class="login-form">
                <div class="login-item">
                    <img src="client/assets/icons/cellphone.svg">
                    <div class="masage-item"></div>

                </div>
                <h1>
                    تایید شماره موبایل
                </h1>
                <p>

                    کد تایید به شماره {{ "0" . auth()->guard('clients')->user()->phone }} ارسال شد
                    <span class="edit-number">
                                <a href="{{ route('login') }}">
                                   ویرایش شماره
                                </a>

                            </span>
                </p>

                <form id="main_form" action="{{ route('set_verify') }}" method="POST">
                    @csrf
                    <input class="activation-code-input w-100 " name="code" placeholder="code">

                </form>

                <div class="withdraw change-submit max-width" onclick="(() => { document.getElementById('main_form').submit() })()">
                    <img src="client/assets/icons/continue.svg">
                    ادامه
                    <div class="time">
                        ۰۱:۲۱
                    </div>


                </div>
            </div>

        </div>


    </section>

    {{--<section id="sec2">
        <div class="block">
            <div class="login-form">
                <div class="login-item">
                    <img src="client/assets/icons/cellphone.svg">
                    <div class="masage-item"></div>

                </div>
                <h1>
                    تایید شماره موبایل
                </h1>
                <p>

                    کد تایید به شماره {{ "0" . auth()->guard('clients')->user()->phone }} ارسال شد
                    <span class="edit-number">
                                <a href="{{ route('login') }}">
                                   ویرایش شماره
                                </a>

                            </span>
                </p>

                <form id="main_form" action="{{ route('set_verify') }}" method="POST">
                    @csrf
                    <input class="activation-code-input w-100 " name="code" placeholder="code">

                </form>

                <div class="withdraw change-submit max-width"
                     onclick="(() => { document.getElementById('main_form').submit() })()">
                    <img src="client/assets/icons/continue.svg">
                    ادامه
                    <div class="time">
                        ۰۱:۲۱
                    </div>


                </div>
            </div>

        </div>


    <script>
        $(document).ready(function(){
            
            var input = $(".activation-code-inputs input");
            console.log(input);
            $(input).on("keyup", function(event) {
                if (event.keyCode === 13) {
                event.preventDefault();
                console.log("object");
                document.getElementById('main_form').submit()
                }
            });
        })


    </script>
    </section>--}}

@endsection

@section('optional_footer_1')

    <script>
        $(document).ready(function () {
            $(".activation-code-input").activationCodeInput({
                number: 4
            });


            var inputNum = $(".activation-code-inputs input");
            $(inputNum).on("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    document.getElementById('main_form').submit()
                }
            });

        });

        function inputFilter(e) {
            var key = e.keyCode || e.which;

            if (
                (!e.shiftKey && !e.altKey && !e.ctrlKey && key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105) ||
                key == 8 ||
                key == 9 ||
                key == 13 ||
                key == 37 ||
                key == 39
            ) {
            } else {
                return false;
            }
        }

        jQuery.fn.activationCodeInput = function (options) {
            var defaults = {
                number: 4,
                length: 1
            };
            var settings = $.extend({}, defaults, options);
            // $('#log').append('options = ' + JSON.stringify(options));
            // $('#log1').append('defaults = ' + JSON.stringify(defaults));
            // $('#log2').append('settings = ' + JSON.stringify(settings));

            return this.each(function () {
                var self = $(this);
                var activationCode = $("<div />").addClass("activation-code");
                var placeHolder = self.attr("placeholder");
                // alert(placeHolder);
                self.replaceWith(activationCode);
                activationCode.append(self);

                var activationCodeInputs = $("<div />").addClass("activation-code-inputs");

                for (var i = 1; i <= settings.number; i++) {
                    activationCodeInputs.append(
                        $("<input />").attr({
                            maxLength: settings.length,
                            onkeydown: "return inputFilter(event)",
                            oncopy: "return false",
                            onpaste: "return false",
                            oncut: "return false",
                            ondrag: "return false",
                            ondrop: "return false"
                        })
                    );
                }

                activationCode.prepend(activationCodeInputs);

                activationCode.on("click touchstart", function (event) {
                    // console.log(event);
                    // console.log(event.type);
                    if (!activationCode.hasClass("active")) {
                        activationCode.addClass("active");
                        setTimeout(function () {
                            activationCode
                                .find(".activation-code-inputs input:first-child")
                                .focus();

                        }, 200);
                    }
                });

                activationCode
                    .find(".activation-code-inputs")
                    .on("keyup input", "input", function (event) {
                        // $(this).css('background','red');

                        if (
                            $(this).val().toString().length == settings.length ||
                            event.keyCode == 39
                        ) {
                            $(this).next().focus();
                            if ($(this).val().toString().length) {

                            }
                        }
                        if (event.keyCode == 8 || event.keyCode == 37) {
                            $(this).prev().focus();
                            if (!$(this).val().toString().length) {

                            }
                        }

                        var value = "";
                        activationCode.find(".activation-code-inputs input").each(function () {
                            // value = value + $(this).val().toString();
                            value += $(this).val().toString();

                        });


                        self.attr({
                            value: value

                        });

                        if (value.length == 4) {
                            $("#verify-submit").css("background", "#ff334b")

                        }
                    });

                $(document).on("click touchstart", function (e) {
                    console.log(e.target);
                    console.log($(e.target).parent());
                    console.log($(e.target).parent().parent());
                    // false true = false
                    // true false = false
                    // false false = false
                    //true true = true
                    if (
                        !$(e.target).parent().is(activationCode) &&
                        !$(e.target).is(activationCode) &&
                        !$(e.target).parent().parent().is(activationCode)
                    ) {
                        var hide = true;

                        activationCode.find(".activation-code-inputs input").each(function () {
                            if ($(this).val().toString().length) {
                                hide = false;

                            }
                        });
                        if (hide) {
                            activationCode.removeClass("active");
                        } else {
                            activationCode.addClass("active");
                        }
                    }
                });
            });
        };

    </script>

@endsection