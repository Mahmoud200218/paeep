@extends('layouts.front')
@section('content')
<div class="container">
    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">
                    </div>
                    <div class="steps-content">
                        <h3><span class="step-number"> </span>{{ __('المعلومات الأساسية') }}</h3>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">{{ __('المعلومات العامة عن الجمعية') }}</li>
                        <li>{{ __('معلومات إضافية') }}</li>
                        <li>{{ __('معلومات إضافية') }}</li>
                        <li>{{ __('معلومات عن المركز') }}</li>
                        <li>{{ __('نطاق عملية المؤسسة') }}</li>
                        <li>{{ __('نطاق عملية المؤسسة') }}</li>


                    </ul>
                </div>
                <div class="right-side">
                    <div class="main active">
                        <!-- <small><i class="fa fa-smile-o"></i></small> -->
                        <div class="text">
                            @if($errors->all())
                            <ul>
                                @foreach($errors->all() as $error)
                                <li class="text text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            <h2>{{ __('المعلومات العامة عن الجمعية') }}</h2>
                            <p>{{ __('الرجاء تعبئة البيانات') }}</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" class="@error('organization_name') is-invalid @enderror" required require name="organization_name" value="{{ old('organization_name') }}" id="user_name" style=" font-size: 12px;" placeholder="{{ __('يرجى كتابة الاسم القانوني الكامل لمنظمتك وأي تسميات مختصرة') }}">
                                @error('organization_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div" style="top: -10px;">
                                <select name="type_of_organization">
                                    <option value="" {{ old('type_of_organization') == ''? 'selected' : '' }} selected hidden>{{ __('نوع المنظمة') }}</option>
                                    <option value="cultural_and_artistic_center" {{ old('type_of_organization') == 'cultural_and_artistic_center'? 'selected' : '' }}>{{ __('مركز ثقافي وفني') }}</option>
                                    <option value="educational_or_higher_education_institution" {{ old('type_of_organization') == 'educational_or_higher_education_institution'? 'selected' : '' }}>{{ __('مؤسسة تعليمية أو تعليم عالي') }}</option>
                                    <option value="governmental_entity" {{ old('type_of_organization') == 'governmental_entity'? 'selected' : '' }}>{{ __('جهة حكومية') }}</option>
                                    <option value="international_non_governmental_organization" {{ old('type_of_organization') == 'international_non_governmental_organization'? 'selected' : '' }}>{{ __('منظمة غير حكومية دولية') }}</option>
                                    <option value="media_and_press_organization" {{ old('type_of_organization') == 'media_and_press_organization'? 'selected' : '' }}>{{ __('منظمة اعلام وصحافة') }}</option>
                                    <option value="non_governmental_organization" {{ old('type_of_organization') == 'non_governmental_organization'? 'selected' : '' }}>{{ __('منظمة غير حكومية') }}</option>
                                    <option value="organizations_of_people_with_disabilities" {{ old('type_of_organization') == 'organizations_of_people_with_disabilities'? 'selected' : '' }}>{{ __('منظمات الأشخاص ذوي الاعاقة') }}</option>
                                    <option value="private_company" {{ old('type_of_organization') == 'private_company'? 'selected' : '' }}>{{ __('شركة خاصة') }} </option>
                                    <option value="research_and_advocacy_centre" {{ old('research_and_advocacy_centre') == 'research_and_advocacy_centre'? 'selected' : '' }}>{{ __('مركز بحوث ومناصرة') }}</option>
                                    <option value="social_institution" {{ old('type_of_organization') == 'social_institution'? 'selected' : '' }}>{{ __('مؤسسة اجتماعية') }}</option>
                                    <option value="technical_or_vocational_education_institute" {{ old('type_of_organization') == 'technical_or_vocational_education_institute'? 'selected' : '' }}>{{ __('معهد تعليم تقني أو مهني') }}</option>
                                    <option value="youth_group" {{ old('type_of_organization') == 'youth_group'? 'selected' : '' }}>{{ __('مجموعة شبابية') }}</option>
                                    <option value="youth_training_center" {{ old('type_of_organization') == 'youth_training_center'? 'selected' : '' }}>{{ __('مركز تدريب الشباب') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" class="@error('main_address') is-invalid @enderror" required require name="main_address" value="{{ old('main_address') }}" id="user_name" placeholder="{{ __('عنوان الفرع الرئيسي') }}">
                                @error('main_address')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="date" class="@error('year_founded') is-invalid @enderror" name="year_founded" value="{{ old('year_founded') }}">
                                <span>{{ __('سنة التأسيس') }}</span>
                                @error('year_founded')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="input-text">
                        <div class="input-div">
                            <input type="text" required require>
                            <span>رقم الموبايل</span>
                        </div>
                        <div class="input-div">
                            <input type="text" required require>
                            <span>البريد الالكتروني</span>
                        </div>
                    </div> -->
                        <!-- <div class="input-text">
                        <div class="input-div">
                            <select>
                                <option selected hidden>اختر الجنس</option>
                                <option>ذكر</option>
                                <option>انثى</option>
                            </select>
                        
                        </div>
                        <div class="input-div">
                            
                            <select>
                                <option selected hidden style="font-family: 'Cairo', sans-serif;">نوع المنظمة</option>
                                <option>مركز ثقافي وفني</option>
                                <option>مؤسسة تعليمية أو تعليم عالي</option>
                                <option>جهة حكومية</option>
                                <option>منظمة غير حكومية دولية</option>
                                <option>منظمة اعلام وصحافة </option>
                                <option>منظمة غير حكومية </option>
                                <option>منظمات الأشخاص ذوي الإعاقة </option>
                                <option>شركة خاصة </option>
                                <option>مركز بحوث ومناصرة </option>
                                <option>مؤسسة اجتماعية</option>
                                <option>معهد تعليم تقني أو مهني</option>
                                <option>مجموعة شبابية</option>
                                <option>مركز تدريب الشباب</option>
                            
                            </select>
                        </div>
                    </div> -->
                        <div class="buttons" style="text-align: left;">
                            <button type="button" class="next_button">{{ __('اضافة') }}</button>
                        </div>

                    </div>
                    <div class="main">
                        <!-- <small><i class="fa fa-smile-o"></i></small> -->
                        <div class="text">
                            <h2>{{ __('معلومات إضافية') }}</h2>
                            <!-- --------------------------- -->
                            <p>{{ __('الرجاء تعبئة البيانات') }}</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" class="@error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required require placeholder="{{ __('الموقع الالكتروني الرسمي') }}">
                                @error('website')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require class="@error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram') }}" placeholder="{{ __('انستجــرام') }}">
                                @error('instagram')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" class="@error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}" required require placeholder="{{ __('فيس بــوك') }}">
                                @error('facebook')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="number" class="@error('annual_budget') is-invalid @enderror" name="annual_budget" value="{{ old('annual_budget') }}" required require placeholder="{{ __('الميزانية السنوية') }}">
                                @error('annual_budget')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-div">
                                <input type="number" class="@error('number_of_centers') is-invalid @enderror" name="number_of_centers" value="{{ old('number_of_centers') }}" required require placeholder="{{ __('عدد المراكز') }}">
                                @error('number_of_centers')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-div">
                                <input type="number" class="@error('number_of_employees') is-invalid @enderror" name="number_of_employees" value="{{ old('number_of_employees') }}" required require placeholder="{{ __('عدد الموظفين') }}">
                                @error('number_of_employees')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button type="button" class="back_button">{{ __('الرجوع') }}</button>
                            <button type="button" class="next_button">{{ __('التالي') }}</button>
                        </div>
                    </div>
                    <div class="main">
                        <!-- <small><i class="fa fa-smile-o"></i></small> -->
                        <div class="text">
                            <h2>{{ __('معلومات إضافية') }}</h2>
                            <p>{{ __('معلومات إضافية') }}</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <textarea class="form-control @error('center_locations') is-invalid @enderror" id="message" name="center_locations" rows="4" placeholder="{{ __('مواقع المركز') }}" style="height: 100px;" style="font-family: 'Cairo', sans-serif;">{{ old('center_locations') }}</textarea>
                                @error('center_locations')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="number" class="@error('registration_number_with_the_ministry_of_interior') is-invalid @enderror" name="registration_number_with_the_ministry_of_interior" value="{{ old('registration_number_with_the_ministry_of_interior') }}" required require placeholder="{{ __('رقم التسجيل لدى وزارة الداخلية') }}">
                                @error('registration_number_with_the_ministry_of_interior')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="number" class="@error('registration_number_with_the_ministry_of_finance') is-invalid @enderror" name="registration_number_with_the_ministry_of_finance" value="{{ old('registration_number_with_the_ministry_of_finance') }}" required require placeholder="{{ __('رقم التسجيل لدى وزارة المالية') }}">
                                @error('registration_number_with_the_ministry_of_finance')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button type="button" class="back_button">{{ __('الرجوع') }}</button>
                            <button type="button" class="next_button">{{ __('التالي') }}</button>
                        </div>
                    </div>

                    <!-- ----------------------------- -->
                    <div class="main">
                        <!-- <small><i class="fa fa-smile-o"></i></small> -->
                        <div class="text">
                            <h2>{{ __('نطاق عملية المؤسسة') }}</h2>
                            <p>{{ __('الرجاء تعبئة البيانات') }}</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="number" class="@error('number_of_current_projects') is-invalid @enderror" name="number_of_current_projects" value="{{ old('number_of_current_projects') }}" placeholder="{{ __('عدد المشاريع الحالية') }}">
                                @error('number_of_current_projects')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <textarea class="form-control @error('major_donors_of_projects') is-invalid @enderror" id="message" name="major_donors_of_projects" rows="4" placeholder="{{ __('المانحون الرئيسيون من مشاريع سابقة/حاليا') }}" style="height: 100px;" style="font-family: 'Cairo', sans-serif;">{{ old('major_donors_of_projects') }}</textarea>
                                @error('major_donors_of_projects')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <textarea class="form-control @error('total_number_of_employees') is-invalid @enderror" id="message" name="total_number_of_employees" rows="4" placeholder="{{ __('اجمالي عدد الموظفين التي تتعامل معهم منظمتك') }}" style="height: 100px;" style="font-family: 'Cairo', sans-serif;">{{ old('total_number_of_employees') }}</textarea>
                                @error('total_number_of_employees')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="buttons button_space">
                            <button type="button" class="back_button">{{ __('الرجوع') }}</button>
                            <button type="button" class="next_button">{{ __('التالي') }}</button>
                        </div>
                    </div>
                    <!-- ---------------- -->
                    <div class="main">
                        <!-- <small><i class="fa fa-smile-o"></i></small> -->
                        <div class="text">
                            <h2>{{ __('نطاق عملية المؤسسة') }}</h2>
                            <p>{{ __('الرجاء تعبئة البيانات') }}</p>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <textarea class="form-control @error('nationalities_of_beneficiaries') is-invalid @enderror" id="message" name="nationalities_of_beneficiaries" rows="4" placeholder="{{ __('جنسيات المستفيدين') }}" style="height: 100px;">{{ old('nationalities_of_beneficiaries') }}</textarea>
                                @error('total_number_of_employees')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <textarea class="form-control @error('age_group_of_beneficiaries') is-invalid @enderror" id="message" name="age_group_of_beneficiaries" rows="4" placeholder="{{ __('الفئة العمرية للمستفيدين') }}" style="height: 100px;">{{ old('age_group_of_beneficiaries') }}</textarea>
                                @error('age_group_of_beneficiaries')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <textarea class="form-control @error('main_strategic_objectives') is-invalid @enderror" id="message" name="main_strategic_objectives" rows="4" placeholder="{{ __('تعداد الأهداف الاستراتيجية الرئيسية التي تهدف منظمتك الى تحقيقها في السنوات الثلاثة - الخمس القادمة') }}" style="height: 100px;">{{ old('main_strategic_objectives') }}</textarea>
                                @error('main_strategic_objectives')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="buttons button_space">
                            <button type="button" class="back_button">الرجوع</button>
                            <button type="button" class="next_button">التالي</button>
                        </div>
                    </div>
                    <!-- ---------------- -->
                    <!-- ---------------- -->
                    <div class="main">
                        <!-- <small><i class="fa fa-smile-o"></i></small> -->
                        <div class="text">
                            <h2>{{ __('نطاق عملية المؤسسة') }}</h2>
                            <p>{{ __('الرجاء تعبئة البيانات') }}</p>
                        </div>

                        <div class="input-text">
                            <div class="input-div fileinput">
                                <input type="file" class="@error('registration_certificate') is-invalid @enderror" name="registration_certificate" value="{{ old('registration_certificate') }}" accept="image/*, application/pdf, application/msword">
                                <span>{{ __('شهادة تسجيل منظمتكو/علم وخبر من وزارة الداخلية') }}</span>
                                @error('registration_certificate')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            @if(old('registration_certificate'))
                            {{ old('registration_certificate') }}
                            @endif
                        </div>
                        <div class="input-text">
                            <div class="input-div fileinput">
                                <input type="file" class="@error('structure_organisationnelle') is-invalid @enderror" name="structure_organisationnelle" accept="image/*, application/pdf, application/msword">
                                <span>{{ __('الهيكل التنظيمي لشركتك') }}</span>
                                @error('structure_organisationnelle')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            @if(old('structure_organisationnelle'))
                            {{ old('structure_organisationnelle') }}
                            @endif
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">{{ __('الرجوع') }}</button>
                            <button type="submit" class="next_button">{{ __('التالي') }}</button>
                        </div>
                    </div>
                    <!-- ---------------- -->


                    <!-- <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>User Photo</h2>
                            <p>Upload your profile picture and share
                                yourself.</p>
                        </div>
                        <div class="user_card">
                            <span></span>
                            <div class="circle">
                                <span><img
                                        src="https://i.imgur.com/hnwphgM.jpg"></span>
                            </div>
                            <div class="social">
                                <span><i class="fa fa-share-alt"></i></span>
                                <span><i class="fa fa-heart"></i></span>
                            </div>
                            <div class="user_name">
                                <h3>Peter Hawkins</h3>
                                <div class="detail">
                                    <p><a href="#">Izmar,Turkey</a>Hiring</p>
                                    <p>17 last day . 94Apply</p>
                                </div>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="submit_button">Submit</button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </form>
</div>
@endsection