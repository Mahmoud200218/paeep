@extends('layouts.front')
@section('content')
<header class="heade">
    <div class="back_heder"></div>
    <div class>

        <div class="slide_heder">
            <!-- Swiper -->
            <div class="swiper mySwiper arow d-flex">
                <div class="swiper-wrapper ">
                    <div class="swiper-slide centerimgheder">
                        <img src="{{ asset('assets/imges/Placeholder.png') }}" alt>
                        <img class="shado" src="imges/Program icons/Rectangle 1502.png') }}" alt>
                        <div class="textimg textimg1 animate__animated animate__fadeInUp">
                            <h1>{{ __('الذين ليس لديهم أمل !') }}</h1>
                            <p>{{ __('بيئة متميزة ، مؤسسة خيرية ، نموذج إبداعي طبيعي') }}</p>
                        </div>

                    </div>
                    <div class="swiper-slide centerimgheder d-flex">
                        <img src="{{ asset('assets/imges/back1.jpg') }}" alt>
                        <img class="shado" src="imges/Program icons/Rectangle 1502.png') }}" alt>
                        <div class="textimg textimg2 animate__animated animate__fadeInUp">
                            <h1>{{ __('من أجل أبنائنا والأجيال القادمة') }}</h1>
                            <p>{{ __('قد يكون الاختبار النهائي لضمير الإنسان هو استعداده للتضحية بشيء اليوم من أجل الأجيال القادمة التي لن تسمع كلمات شكرها') }}</p>
                            <!-- <form action="">
                    <div class="serch">
                      <input type="text">
                      <div class="serchtex"><p><a href="">بحث</a></p></div>
                    </div>
                  </form> -->
                        </div>

                    </div>
                    <div class="swiper-slide centerimgheder">
                        <img src="{{ asset('assets/imges/iiii2.jpeg') }}" alt>
                        <img class="shado" src="{{ asset('assets/imges/Program icons/Rectangle 1502.png') }}" alt>
                        <div class="textimg textimg3 animate__animated animate__fadeInUp">
                            <h1>{{ __('الأرض مكان جميل وتستحق القتال من أجلها') }}</h1>
                            <p>{{ __('طور الحياة لا يعني إهمال البيئة من حولك') }}</p>
                            <button class="usbtn"><a href="{{ route('contact') }}" style="color: #FFF;">{{ __('تواصل معنا') }}</a></button>
                        </div>
                    </div>
                </div>
                <div class="next "><i class='bx bx-right-arrow-alt'></i></div>
                <div class="prev"><i class='bx bx-left-arrow-alt'></i></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

</header>

<section class="news  ">
    <div class="containerr">
        <div class="textnews">
            <h1>{{ __('اخر الأخبار') }}</h1>
            <a href="{{ route('all.events') }}">
                <h6>{{ __('عرض الكل') }}</h6>
            </a>
        </div>

        <div class="swiper mySwiper2">
            <div class="swiper-wrapper ">
                @foreach($events as $event)
                <a href="{{ route('event.details', $event->id) }}">
                    <div class=" card cardNews swiper-slide">
                        <img src="{{ asset('storage/' . $event->cover_image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="{{ route('event.details', $event->id) }}">
                                <h5 class="card-title">{{ $event->title }}</h5>
                            </a>
                            <p class="card-text">{{ $event->description }}</p>

                        </div>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>

</section>

<section class="association_pro">
    <div class="containerr">
        <div class="textnews">
            <h1>{{ __('برامج الجمعية') }}</h1>
            <a href="{{ route('all.programs') }}">
                <h6>{{ __('عرض الكل') }}</h6>
            </a>
        </div>

        <div class="allcardpro">
            @foreach($programs as $program)
            <a href="{{ route('program.details', $program->id) }}">
                <div class="cardpro" style="min-width:280px;">
                    <img src="{{ asset('storage/' . $program->cover_image) }}" alt data-tilt data-tilt-scale="1.1">
                    <h4>{{ $program->title }}</h4>
                    <p>{{ $program->description }}</p>

                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>

<section class="count_sec" id="count_sec">
    <div class="containerr">
        <div class="textnews">
            <h1>{{ __('أبرز الإنجازات') }}</h1>
        </div>

        @php
        $donates = App\Models\Front\Donate::count();
        $companies = App\Models\Front\CompaniesRequest::count();
        $jobs = App\Models\Front\Job::count();
        $volunteers = App\Models\Front\Volunteer::count();
        $missionsTotal = $donates + $companies + $volunteers + $jobs;
        @endphp

        <div class="allcardpro">
            <div class="cardpro crad_achievements">
                <img class="h" src="imges/Group 7814.png') }}" alt data-tilt data-tilt-scale="1.1">
                <h3>{{ __('الشركات العالمية') }}</h3>
                <div class="con">

                    <h2 class="counter" data-target="{{ App\Models\Company::count() }}"></h2>
                    <h2>+</span>
                </div>

            </div>
            <div class="cardpro crad_achievements">
                <img src="{{ asset('assets/imges/Group 7815.png') }}" alt data-tilt data-tilt-scale="1.1">
                <h3>{{ __('المتبرعين') }}</h3>
                <div class="con">
                    <h2 class="counter" data-target="{{ $donates }}"></h2>
                    <h2>+</span>
                </div>

            </div>
            <div class="cardpro crad_achievements">
                <img src="{{ asset('assets/imges/Group 7816.png') }}" alt data-tilt data-tilt-scale="1.1">
                <h3>{{ __('مهمات منجزة') }}</h3>
                <div class="con">
                    <h2 class="counter" data-target="{{$missionsTotal}}"></h2>
                    <h2>+</span>
                </div>
            </div>
            <div class="cardpro crad_achievements">
                <img src="{{ asset('assets/imges/Group 7817.png') }}" alt data-tilt data-tilt-scale="1.1">
                <h3>{{ __('عدد المتطوعين') }}</h3>
                <div class="con">
                    <h2 class="counter" data-target="{{$volunteers}}"></h2>
                    <h2>+</span>
                </div>

            </div>

        </div>

    </div>
</section>

<section class="comp_section">
    <div class="containerr">
        <div class="textnews">
            <h1>{{ __('الشــركـــاء') }}</h1>
        </div>

        <div class="arow3">
            <div class="swiper mySwiper3">
                <div class="swiper-wrapper ">
                    <div class="swiper-slide">
                        <div class="card_comp">
                            <img src="{{ asset('assets/imges/Group 3671.png') }}" alt>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card_comp">
                            <img src="{{ asset('assets/imges/Group 3673.png') }}" alt>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card_comp">
                            <img src="{{ asset('assets/imges/Group 3677.png') }}" alt>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card_comp">
                            <img src="{{ asset('assets/imges/Group 3679.png') }}" alt>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="nextt "><i class='bx bx-right-arrow-alt'></i>
                <h5>{{ __('السابق') }}</h5>
            </div>
            <div class="prevt"><i class='bx bx-left-arrow-alt'></i>
                <h5>{{ __('التالي') }}</h5>
            </div>

        </div>

    </div>
</section>
@endsection