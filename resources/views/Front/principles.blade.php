@extends('layouts.front')
@section('content')
<div class="containerr">
   <section class="hedsid">
        <h6><a href="{{ __('index.html') }}">{{ __('الرئيسية') }} /</a></h6>
        <h6>{{ __('مبادئنا وقيمنا') }}</h6>
    </section>
    <section class="aboutt">
        <h1>{{ __('مبادئنا وقيمنا') }}</h1>

        <div class="texts_prinp">

            <div class="text_princples">
                <div class="headtex_principles">
                    <div class="line_priciples"></div>
                    <h4>{{ __('احترام الطبيعة والبيئة') }}</h4>
                </div>
                <div class="arrowtext">
                    <i class='bx bx-chevron-left'></i>
                    <p>
                        {{ __('تؤمن الجمعية بضرورة الحفاظ على البيئة والموارد الطبيعية حيث تقوم الجمعية بتطبيق أخلاقيات ادارية وشرائية جديدة لحفظ البيئة والتوعية بالقرارات الدولية ذات العلاقة خلال تنفيذ أنشطتها وطلب المشتريات التي لا تضر بالبيئة بالإضافة الى استخدام البحث العلمي والأكاديمي لتطوير استخدامات وحلول بيئية تتعلق بالطاقة المستدامة كجزء أساسي من اسهامات المؤسسة في تحقيق التنمية المستدامة.') }}
                    </p>
                </div>
            </div>

            <div class="text_princples">
                <div class="headtex_principles">
                    <div class="line_priciples"></div>
                    <h4>{{ __('حقوق الانسان والكرامة الإنسانية') }}</h4>
                </div>
                <div class="arrowtext">
                    <i class='bx bx-chevron-left'></i>
                    <p>{{ __('تؤمن الجمعية بأنه يقع على عاتقها الى جانب المسئولية الفردية الملقاة على عاتقها تجاه تحقيق رؤيتها ورسالتها بما فيه المصلحة العامة. فان هناك مسئولية جماعية تجاه المجتمع تتعلق باحترام ودعم ونشر مبادئ الكرامة الانسانية وحقوق الانسان وضمان أخذها بعين الاعتبار خلال جميع مراحل تنفيذ فعاليات المؤسسة لترسيخ هذه الثقافة لدى المواطنين.') }}</p>
                </div>
            </div>
        </div>

        <div class="texts_prinp">

            <div class="text_princples">
                <div class="headtex_principles">
                    <div class="line_priciples"></div>
                    <h4>{{ __('ضمان حماية الكرامة وعدم التسبب بالأذى') }}</h4>
                </div>
                <div class="arrowtext">
                    <i class='bx bx-chevron-left'></i>
                    <p>{{ __('تؤمن جمعية بيئتي بأن على المستفيدين المستهدفين في المشاريع الحصول على المساعدات المختلفة الخاصة بهم بالشكل الذي يحمي ويحفظ كرامتهم ويضمن عدم تعرضهم للأذى، وذلك خلال فترات تنفيذ الأنشطة للمشاريع المختلفة ') }}</p>
                </div>
            </div>

            <div class="text_princples">
                <div class="headtex_principles">
                    <div class="line_priciples"></div>
                    <h4>{{ __('الوصول الفعال') }}</h4>
                </div>
                <div class="arrowtext">
                    <i class='bx bx-chevron-left'></i>
                    <p>{{ __('تؤمن جمعية بيئتي أنه من حق المستفيدين المستهدفين في المشروع الحصول على المساعدات الخاصة بهم في التوقيت المناسب والمكان المناسب من أجل ضمان تحقق الغاية ممكنة من الخدمة') }}</p>
                </div>
            </div>
        </div>

        <div class="texts_prinp">

            <!-- Repeat the same structure for other sections -->

        </div>
    </section>
</div>

@endsection