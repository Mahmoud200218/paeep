<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Association</title>
    @if(LaravelLocalization::getCurrentLocaleDirection() == 'ltr')
    <link rel="stylesheet" href="{{ asset('assets/css/en/style.ltr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/en/contact_us.ltr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/en/swiper.ltr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/en/news.ltr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/en/news_details.ltr.css') }}">
    <link media="all" rel="stylesheet" href="{{ asset('assets/css/en/volunteer_request.ltr.css') }}" />
    <link media="all" rel="stylesheet" href="{{ asset('assets/css/en/volunteerrequest.ltr.css') }}" />
    @else
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contact_us.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/news.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/news_details.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Program_Details.css') }}" />
    <link media="all" rel="stylesheet" href="{{ asset('assets/css/volunteer_request.css') }}" />
    <link media="all" rel="stylesheet" href="{{ asset('assets/css/volunteerrequest.css') }}" />
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light" id="navbar">
        <div class="container-fluid ">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/imges/Group 8541.png') }}" alt></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-0 mb-0 mb-lg-0">

                    <li>
                        <div class="areasearcheee">
                            <div class="inputser">
                                <i class='bx bx-search searchnon'></i>
                                <input type="text" placeholder="ابحث هنا">
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('الصفحة الرئيسية') }}</a>
                    </li>
                    <li class="nav-item dropdown  ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('من نحن') }}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about') }}">{{ __('من نحن') }}</a></li>

                            <li><a class="dropdown-item" href="{{ route('principles') }}">{{ __('مبادئنا وقيمنا') }}</a></li>

                            <li><a class="dropdown-item" href="{{ route('objectives') }}">{{ __('أهدافنا') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('المصادر')}}
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a class="dropdown-item" href="{{ route('publications.reports') }}">{{ __('الاصدارات والتقارير') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('visual.library') }}">{{ __('المكتبة المرئية') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('events') }}">{{ __('الأخبار والاعلانات') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('انضم إلينا') }}</a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('volunteer.request') }}">{{ __('طلب تطوع') }}</a></li>

                            <li><a class="dropdown-item" href="{{ route('job.request') }}">{{ __('طلب توظيف') }}</a></li>

                            <li><a class="dropdown-item" href="{{ route('company.request') }}">{{ __('طلب بناء شركة')}}
                                </a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">{{ __('تواصل معنا') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ LaravelLocalization::getCurrentLocaleNative() }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <div class="btns">
                    <div class="btnserch">
                        <i class='bx bx-search' id="search"></i>

                        <div>
                            <div class="areasearch">
                                <div class="inputser">
                                    <i class='bx bx-search searchnon'></i>
                                    <input type="text" placeholder="{{ __('ابحث هنا') }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="btn_search">
                        <a href="{{ route('donate') }}">
                            <div class="btnnow">
                                <h6>{{ __('تبرع الان') }}</h6>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32.062" height="29.898" viewBox="0 0 32.062 29.898">
                                    <defs>
                                        <clippath id="clip-path">
                                            <rect id="Rectangle_14" data-name="Rectangle 14" width="32.062" height="29.898" fill="#fff" />
                                        </clippath>
                                    </defs>
                                    <g id="Group_15" data-name="Group 15" clip-path="url(#clip-path)">
                                        <path id="Path_128" data-name="Path 128" d="M32.051,9.019a11.049,11.049,0,0,1-.267,2.78c-.151.752-.639.9-1.2.376-.483-.457-.943-.939-1.416-1.407-.689-.682-1.245-.773-1.725-.29-.442.445-.34,1.029.3,1.671.836.84,1.679,1.673,2.513,2.515.3.305.619.66.2,1.065-.4.387-.758.117-1.073-.2q-2.16-2.162-4.322-4.322c-.147-.147-.294-.3-.454-.427a.883.883,0,0,0-1.245.025.927.927,0,0,0-.172,1.245,3.034,3.034,0,0,0,.523.614q2.421,2.43,4.849,4.853a5.08,5.08,0,0,1,.425.455.515.515,0,0,1,.012.688.558.558,0,0,1-.729.16,2.257,2.257,0,0,1-.528-.429q-2.1-2.09-4.192-4.187a3.578,3.578,0,0,0-.457-.422.936.936,0,0,0-1.258.054A.954.954,0,0,0,21.7,15.1a2.526,2.526,0,0,0,.449.514q2.246,2.252,4.5,4.5a3.558,3.558,0,0,1,.416.462.538.538,0,0,1-.055.739.531.531,0,0,1-.735.07,3.46,3.46,0,0,1-.465-.412q-1.7-1.695-3.4-3.394A2.832,2.832,0,0,0,22,17.2a.949.949,0,0,0-1.306.072.935.935,0,0,0-.052,1.3,6.52,6.52,0,0,0,.686.723c1.086,1.09,2.18,2.172,3.26,3.268.505.512.478.823-.061,1.3a58.338,58.338,0,0,1-7.854,5.826,1.041,1.041,0,0,1-1.254,0,58.355,58.355,0,0,1-7.854-5.826c-.539-.477-.567-.787-.062-1.3,1.124-1.14,2.261-2.267,3.392-3.4.132-.132.268-.262.395-.4a1.045,1.045,0,0,0,.113-1.5,1.02,1.02,0,0,0-1.5.1c-.673.649-1.327,1.319-1.989,1.98q-.927.926-1.854,1.851c-.292.29-.628.474-.975.123s-.162-.684.129-.976Q7.547,18,9.885,15.66a4.8,4.8,0,0,0,.428-.453,1.048,1.048,0,0,0-.054-1.368.992.992,0,0,0-1.36.018c-.236.2-.448.434-.669.654Q6.288,16.45,4.346,18.389a2.711,2.711,0,0,1-.466.41.567.567,0,0,1-.787-.109.529.529,0,0,1,.013-.738,5.3,5.3,0,0,1,.385-.407q2.424-2.427,4.849-4.854a3.4,3.4,0,0,0,.532-.607.924.924,0,0,0-.132-1.25.9.9,0,0,0-1.25-.056,10.027,10.027,0,0,0-.813.772Q4.8,13.422,2.928,15.3q-.154.154-.31.308c-.3.29-.633.458-.986.137-.37-.336-.188-.68.094-.975.344-.361.7-.71,1.054-1.063.587-.589,1.185-1.168,1.759-1.769a1,1,0,0,0,.107-1.446.966.966,0,0,0-1.49.049c-.578.538-1.114,1.121-1.688,1.663-.506.477-1.024.345-1.15-.32a11.517,11.517,0,0,1,.74-7.667A7.486,7.486,0,0,1,7.034.116a8.844,8.844,0,0,1,8.672,3.8c.321.425.437.307.69-.037A9.039,9.039,0,0,1,23.914,0,8.008,8.008,0,0,1,31.93,6.965a12.287,12.287,0,0,1,.121,2.054M1.389,10.534c.449-.407.805-.779,1.21-1.088a2.113,2.113,0,0,1,3.155.515c.262.409.4.363.718.083a2.165,2.165,0,0,1,2.692-.394A2.073,2.073,0,0,1,10.2,12.039a.387.387,0,0,0,.224.492,2.118,2.118,0,0,1,1.159,2.893.451.451,0,0,0,.209.612,2.177,2.177,0,0,1,.288,3.64c-1.022,1.036-2.047,2.069-3.091,3.082-.306.3-.346.468.014.771a63.845,63.845,0,0,0,6.417,4.736.988.988,0,0,0,1.24,0,63.725,63.725,0,0,0,6.417-4.736c.35-.3.342-.464.027-.771C22,21.691,20.9,20.611,19.84,19.5a2.129,2.129,0,0,1,.343-3.387c.384-.254.4-.457.257-.857a2.078,2.078,0,0,1,1.046-2.636.582.582,0,0,0,.377-.757,2.077,2.077,0,0,1,1.261-2.328,2.229,2.229,0,0,1,2.568.556c.148.133.254.4.517.054,1.122-1.481,2.454-1.56,3.78-.265a1.888,1.888,0,0,0,.727.59,9.455,9.455,0,0,0,.014-3.208c-.6-4.5-4.483-6.609-8.421-5.879A8.157,8.157,0,0,0,16.775,5.49c-.513.836-.958.845-1.456.014A9.893,9.893,0,0,0,13.188,3C9.239-.328,2.366,1.091,1.407,6.936a9.241,9.241,0,0,0-.018,3.6" transform="translate(0 0)" fill="#fff" />
                                    </g>
                                </svg>

                            </div>
                        </a>

                    </div>

                </div>

            </div>
    </nav>

    @yield('content')

    <footer class="footer">

        <div class="containerr">

            <div class="allfooter">
                <div class="rightfooter">
                    <h5>{{ __('معلومات عنا') }}</h5>
                    <p>{{ __('تعمل الجمعية على تعزيز مفاهيم حماية البيئة من خلال نشر الوعي البيئي والمشاركة في القضايا البيئية الاتي تتلائم أنشطتنا مه حاجة المجتمع المحلي') }}</p>

                    <div>
                        <h5>
                            {{ __('موقعنا') }}
                        </h5>

                        <div class="point">
                            <div class="imgpoint">
                                <img src="{{ asset('assets/imges/Group 7813.png') }}" alt>
                            </div>
                            <p>{{ __('غزة-فلسطين-الرمال-شارع عمرو بن العاص') }}
                                <br>{{ __('مقابل مدرسة المامونية خلف معلب') }}
                                {{ __('فلسطين') }}
                            </p>
                        </div>
                        <div class="point">
                            <div class="imgpoint">
                                <img src="{{ asset('assets/imges/Group 9.png') }}" alt>
                            </div>

                            <p>+972-592-616-000</p>
                        </div>
                    </div>

                </div>

                <div class="leftfooter">
                    <div class="ppfoter">
                        <h5>{{ __('من نحن') }}</h5>
                        <p><a href="{{ route('all.programs') }}">{{ __('البرامج') }}</a></p>
                        <p><a href="{{ route('about') }}">{{ __('نبذة عن الجمعية') }}</a></p>
                        <p><a href="{{ route('principles') }}">{{ __('الرؤية') }}</a></p>
                        <p><a href="{{ route('principles') }}">{{ __('الرسالة') }}</a></p>
                        <p><a href="{{ route('objectives') }}">{{ __('القيم') }}</a></p>
                        <p><a href="{{ route('objectives') }}">{{ __('الأهداف الاستراتيجية') }}</a></p>
                    </div>
                    <div class="ppfoter">
                        <h5>{{ __('المصادر') }}</h5>
                        <p><a href="{{ route('publications.reports') }}">{{ __('التقارير') }}</a></p>
                        <p><a href="{{ route('publications.reports') }}">{{ __('الإصدارات') }} </a></p>
                        <p><a href="{{ route('visual.library') }}">{{ __('مكتبة الصور') }}</a></p>
                        <h5>{{ __('الأخبار والإعلانات') }}</h5>
                        <p><a href="{{ route('events') }}">{{ __('الأخبار') }}</a></p>
                        <p><a href="{{ route('events') }}">{{ __('الإعلانات') }}</a></p>
                    </div>
                    <div class="ppfoter">
                        <h5>{{ __('إنضم الينا') }}</h5>
                        <p><a href="{{ route('job.request') }}">{{ __('طلبات التوظيف') }}</a></p>
                        <p><a href="{{ route('volunteer.request') }}">{{ __('طلب تطوع') }} </a></p>
                        <p><a href="{{ route('company.request') }}">{{ __('بناء شركة') }}</a></p>
                        <h5>{{ __('تواصل معنا') }}</h5>
                        <p><a href="{{ route('contact') }}">{{ __('اتصل بنا') }}</a></p>
                        <p><a href="{{ route('contact') }}">{{ __('معلومات التواصل') }}</a></p>
                    </div>

                </div>

            </div>
        </div>
        <div class="footerbotn">
            <div class="container ">
                <div class="footerall">
                    <p> {{ __('جميع الحقوق محفوظة للموقع الإلكتروني جمعية فلسطين لحماية') }}
                        {{ __('البيئة © 1443هـ - 2022م') }}
                    </p>
                    <div class="alliconbt">
                        <a href="#">
                            <div class="icon_footericon">
                                <div class="imgfooticon">
                                    <i class='bx bxl-twitter'></i>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon_footericon">
                                <div class="imgfooticon">
                                    <i class='bx bxl-facebook'></i>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon_footericon">
                                <div class="imgfooticon">
                                    <i class='bx bxl-instagram'></i>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon_footericon">
                                <div class="imgfooticon">
                                    <i class='bx bx-envelope'></i>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon_footericon">
                                <div class="imgfooticon">
                                    <i class='bx bx-lemon'></i>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>

        </div>

    </footer>
    <style>
        .search-icon {
            background-color: #0091DE;
            color: #FFF;
            padding: 10px;
            margin-top: 10px;
        }

        .search-input {
            max-width: 25%;
            margin: 10px;
        }

        /* Style for the image within the container */
        .imgbig img {
            max-width: 100%;
            max-height: 50%;
            object-fit: cover;
            /* Crop or fit the image as needed */
            border-radius: 8px;
            /* Add rounded corners to the image */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Add a subtle shadow */
        }
    </style>

    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bxs-chevron-up-circle'></i>
    </a>
    <script src="{{ asset('assets/js/jquery library.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="{{ asset('assets/js/vanila_tilt.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/volunteerrequest.js') }}"></script>
    <script src="{{ asset('assets/js/volunteer_request.js') }}"></script>
</body>

</html>