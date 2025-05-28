@extends('layouts.front')
@section('content')
<div class="containerr">
    <section class="hedsid">
        <h6><a href="index.html">{{ __('الرئيسية') }}/</a></h6>
        <h6>{{ __('من نحن') }}</h6>
    </section>

    <section class="aboutt objective">
        <h1>{{ __('الأهداف') }}</h1>

        <div class="text_princples hedpdj">
            <div class="headtex_principles">
                <div class="line_priciples"></div>
                <h4>{{ __('الهدف الرئيسي:') }}</h4>
            </div>
            <div class="arrowtext aa">
                <i class='bx bx-chevron-left'></i>
                <p>{{ __('تعزيز صمود الفئات المهمشة وتمكينها من المشاركة في العملية التنموية واتخاذ القرارات ذات الطابع البيئي والصحي') }}</p>
            </div>
        </div>

        <div class="texts_prinp">

            <div class="text_princples">
                <div class="headtex_principles">
                    <div class="line_priciples"></div>
                    <h4>{{ __('ضمان حماية الكرامة وعدم التسبب بالأذى') }}</h4>
                </div>
                <div class="arrowst">
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('تحسين الوصول للموارد الصديقة للبيئة من أجل المحافظة على بيئة صحية وآمنة') }}</p>
                    </div>
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('تعزيز صمود الشعب الفلسطيني في حالات الطوارئ والكوارث الطبيعية والإنسانية') }}</p>
                    </div>
                </div>
                <div class="arrowst">
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('تمكين الأسر الفلسطينية الأكثر احتياجاً والوصول بهم لحالة استقلال اقتصادي مستدام') }}</p>
                    </div>
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('بناء قدرات الجمعية وطاقمها وشركائها') }}</p>
                    </div>
                </div>

                <div class="headtex_principles">
                    <div class="line_priciples"></div>
                    <h4>{{ __('الأهداف الخاصة') }}</h4>
                </div>
                <div class="arrowst">
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('دعم آليات الحصول على بيئة صحية وآمنة في المؤسسات التعليمية والمراكز الصحية') }}</p>
                    </div>
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('دعم آليات الحصول على فرص عمل لمعيلي الأسر الفقيرة في جميع أنحاء القطاع') }}</p>
                    </div>
                </div>
                <div class="arrowst">
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('الحفاظ على البيئة من خلال نشر الوعي البيئي بين أفراد المجتمع') }}</p>
                    </div>
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('توفير الأمن الغذائي وتحسين سبل عيش المزارعين والمتضررين') }}</p>
                    </div>
                </div>

                <div class="arrowst">
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('دعم وتحسين الظروف المعيشية للمتضررين من الحروب والأزمات') }}</p>
                    </div>
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('المساهمة في تحسين النظام الصحي للاستجابة لاحتياجات المجتمع خلال الطوارئ والأزمات') }}</p>
                    </div>
                </div>
                <div class="arrowst">
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('تطوير خطط وسياسات وآليات العمل في المؤسسة بما يخدم تحقيق رسالتها وأهدافها') }}</p>
                    </div>
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('المساهمة في تطوير قدرات طاقم المؤسسة وشركائها') }}</p>
                    </div>
                </div>

                <div class="arrowst">
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('تحسين شبكة علاقات المؤسسة على المستويين الإقليمي والدولي') }}</p>
                    </div>
                    <div class="arrowtext">
                        <i class='bx bx-chevron-left'></i>
                        <p>{{ __('تطوير البنية التحتية للمؤسسة') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
