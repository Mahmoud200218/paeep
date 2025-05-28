@extends('layouts.front')
@section('content')

<head>
    <title>donate</title>
    <link rel="stylesheet" href="{{ asset('assets/css/donate.css') }}" />

</head>

<div class="containerr">
    <section class="hedsid">
        <h6><a href="{{ route('home') }}">{{ __('الرئيسية') }} / </a></h6>
        <h6> {{ __('تبرع الان') }} </h6>
    </section>

    <section class="aboutt">
        <h1> {{ __('تبرع الان') }} </h1>

        @if($errors->all())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text text-danger">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form action="{{ route('donate.store') }}" method="POST" class="body_donate">
            @csrf
            <input type="hidden" name="price" id="donation_amount">
            <input type="hidden" name="payment_method" id="donate_payment_method">
            <div class="right_donate">
                <h2>{{ __('تفاصيل المتبرع') }}</h2>
                <div class="blowline"></div>

                <div class="input_donate">
                    <input type="text" name="donater_name" value="{{ old('donater_name') }}" placeholder="{{ __('اسم المتبرع') }}">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('البريد الإلكتروني') }}">
                </div>

                <div class="input_donate">
                    <div class="selectPhone">
                        <input class="inputPhoneI" name="phone_number" value="{{ old('phone_number') }}" type="tel" id="phone" placeholder="{{ __('رقم الموبايل') }}">
                    </div>
                    <select name="project_type" class="form-select" aria-label="">
                        <option value="" selected>{{ __('اختر المشروع الذي تود التبرع به') }}</option>
                        <option value="community_care_initiatives" {{ old('project_type') == 'community_care_initiatives'? 'selected' : '' }}>{{ __('مبادرات الرعاية المجتمعية') }}</option>
                        <option value="elderly_care" {{ old('project_type') == 'elderly_care'? 'selected' : '' }}>{{ __('رعاية المسنين') }}</option>
                        <option value="safe_streets" {{ old('project_type') == 'safe_streets'? 'selected' : '' }}>{{ __('شوارع أمنة') }}</option>
                        <option value="empowerment_for_all" {{ old('project_type') == 'empowerment_for_all'? 'selected' : '' }}>{{ __('التمكين للجميع') }}</option>
                        <option value="emergency_relief" {{ old('project_type') == 'emergency_relief'? 'selected' : '' }}>انقاذ في حالة الطوارئ</option>
                    </select>
                </div>
                <div class="input_donate">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="{{ __('رسالتك لنا') }}">{{ old('message') }}</textarea>
                </div>
                <div class="inputCheck">
                    <input class="form-check-input" type="checkbox" name="confirmation" value="1" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        {{ __('التعريف بالمتبرع') }}
                        <br>
                        {{ __('لا بأس بذكر اسمي في في لوائح الشرف والشكر') }}
                    </label>
                </div>
            </div>


            <div class="leftdonateForm">
                <div class="mt-4">

                    <label style="font-weight: bold; font-size: 16px;" for="">{{ __('اختر المبلغ المراد التبرع به') }}</label>

                    <div class="cardsDonate">
                        <div class="cardsDonate">
                            <div class="cardDonate" data-amount="20">
                                <i class='bx bx-check'></i>
                                <span>$20</span>
                            </div>
                        </div>
                        <div class="cardsDonate">
                            <div class="cardDonate" data-amount="50">
                                <i class='bx bx-check'></i>
                                <span>$50</span>
                            </div>
                        </div>
                        <div class="cardsDonate">
                            <div class="cardDonate" data-amount="100">
                                <i class='bx bx-check'></i>
                                <span>$100</span>
                            </div>
                        </div>
                        <div class="cardsDonate">
                            <div class="cardDonate" data-amount="500">
                                <i class='bx bx-check'></i>
                                <span>$500</span>
                            </div>
                        </div>
                        <div class="cardsDonate">
                            <div class="cardDonate" data-amount="1000">
                                <i class='bx bx-check'></i>
                                <span>$1000</span>
                            </div>
                        </div>
                        <div class="cardsDonate">
                            <div class="cardDonate" data-amount="2000">
                                <i class='bx bx-check'></i>
                                <span>$2000</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="inputCheck anotherAmount">
                            <input class="form-check-input inputCheckA" type="checkbox" value="{{ old('other_price') }}" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                {{ __('إضافة مبلغ اخر') }}
                            </label>
                        </div>
                    </div>
                    <div class="input_donate">
                        <div class=" inputPriceI  input-group mb-3" style=" max-width:300px;">
                            <span class=" input-group-text textDI inputCA">$</span>
                            <input type="number" class="form-control inputCA" name="other_price" disabled aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>

                </div>

                <div class="mt-4">

                    <h5>{{ __('طريقة التبرع') }}</h5>

                    <div class="cardsDonate">
                        <div class="payment-methods" style="display: flex;">
                            @foreach($methods as $method)
                            <div class="cardDonateS payment-method" style="margin:0 10px;" data-payment="{{ $method->slug }}">
                                <label for="{{ $method->slug }}">
                                    <input type="radio" id="{{ $method->slug }}" name="payment_method" value="{{ $method->slug }}" style="display: none;">
                                    <i class='bx bx-check'></i>
                                    <img src="{{  $method->icon }}" alt="{{ $method->name }}">
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- <div class="cardDonateS" data-payment="visa">
                            <i class='bx bx-check'></i>
                            <img src="{{ asset('assets/images/visa-svgrepo-com.svg') }}" alt="">
                        </div>
                        <div class="cardDonateS" data-payment="stripe">
                            <i class='bx bx-check'></i>
                            <img src="{{ asset('assets/images/stripe-purple-300x300.svg') }}" alt="">
                        </div> -->
                    </div>

                </div>

                <button type="submit" class="btnDonare">{{ __('تبرع') }}</button>


                <div class="mt-4">

                    <h5>{{ __('موثوق من') }}</h5>

                    <div class="imgGC">
                        <img src="{{ asset('assets/images/masterCardS.svg') }}" alt="">
                        <img src="{{ asset('assets/images/visaa.svg') }}" alt="">
                        <img src="{{ asset('assets/images/3d-secure.svg') }}" alt="">
                        <img src="{{ asset('assets/images/paypal.svg') }}" alt="">

                        <div class="d-flex gap-2">
                            <img class="imgS" src="{{ asset('assets/images/secureCheckOut.svg') }}" alt="">
                            <img class="imgS" src="{{ asset('assets/images/privacyProtected.svg') }}" alt="">
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </section>
</div>
<script src="{{ asset('assets/js/jquery library.js') }}"></script>


<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {});

    output = document.querySelector("#output");

    var iti = window.intlTelInput(input, {
        nationalMode: true,
        utilsScript: "../../build/js/utils.js?1678446285328" // just for formatting/placeholders etc
    });

    var handleChange = function() {
        var text = (iti.isValidNumber()) ? "International: " + iti.getNumber() : "Please enter a number below";
        var textNode = document.createTextNode(text);
        output.innerHTML = "";
        output.appendChild(textNode);
    };

    // listen to "keyup", but also "change" to update when the user selects a country
    input.addEventListener('change', handleChange);
    input.addEventListener('keyup', handleChange);
</script>

<script>
    $(".cardDonate").click(function() {

        $(".cardDonate").removeClass("active");
        $(".inputCheckA").prop("checked", false);
        $(".inputCA").prop("disabled", true);
        $(".inputCA").val("")
        $(this).addClass("active");

    });
    $(".anotherAmount").click(function() {
        $(".cardDonate").removeClass("active");
        if ($('.anotherAmount').attr('checked')) {
            $(".inputCA").prop("disabled", true);
        } else {
            $(".inputCA").prop("disabled", false);
        }
        $(".inputCA").val("")
    });

    /////////////////////////////////////////

    $(".cardDonateS").click(function() {

        $(".cardDonateS").removeClass("active");
        $(this).addClass("active");

    });

    const cardDonates = document.querySelectorAll('.cardDonate');
    const donationAmountInput = document.getElementById('donation_amount');

    cardDonates.forEach(card => {
        card.addEventListener('click', () => {
            //Remove the 'active' class from all cards
            cardDonates.forEach(card => card.classList.remove('active'));
            //// Add the 'active' class to the clicked card
            card.classList.add('active');
            // Set the selected donation amount in the hidden input field.
            // Get the 'data-amount' attribute value of the clicked card and assign it to the input field's value.
            donationAmountInput.value = card.getAttribute('data-amount');
        });
    });


    // Payment Methods
    const paymentMethods = document.querySelectorAll('.payment-method');

    paymentMethods.forEach(method => {
        method.addEventListener('click', () => {
            const radioInput = method.querySelector('input[type="radio"]');
            if (radioInput) {
                radioInput.checked = true;
            }
        });
    });
</script>
@endsection