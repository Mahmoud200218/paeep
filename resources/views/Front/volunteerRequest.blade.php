@extends('layouts.front')
@section('content')
<div class="container">
    <form action="{{ route('volunteer.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">

                    </div>
                    <div class="steps-content">
                        <h3><span class="step-number"> </span>{{ __('المعلومات الأساسية') }}</h3>

                    </div>
                    <ul class="progress-bar">
                        <li class="active">{{ __('المعلومات الأساسية') }}</li>
                        <li>{{ __('معلومات إضافية') }}</li>

                    </ul>
                </div>
                @csrf
                <div class="right-side">
                    <div class="main active">


                        @if($errors->all())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li class="text text-danger"> {{ $error }} </li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="text">
                            <h2 style="font-weight: bold;">{{ __('طلب التطوع') }}</h2>
                            <p>{{ __('الرجاء تعبئة البيانات') }}</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" class="@error('full_name') is-invalid @enderror" value="{{ old('full_name') }}" required require name="full_name" id="user_name" placeholder="{{ __('الاسم الكامل') }}">
                                @error('full_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-div">
                                <input type="number" class="@error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required require name=" phone_number" placeholder="{{ __('رقم الموبايل') }}">
                                @error('phone_number')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required require name="email" id="user_name" placeholder="{{ __('البريد الإلكتروني') }}">
                                @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-div">
                                <input type="text" class="@error('address') is-invalid @enderror" value="{{ old('address') }}" required require name="address" placeholder="{{ __('العنوان بالتفصيل') }}">
                                @error('address')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <select name="volunteer">
                                    <option value="" {{ old('volunteer') == '' ? 'selected' : '' }} selected hidden>{{ __('هل تطوعت من قبل') }} ؟</option>
                                    <option value="yes" {{ old('volunteer') == 'yes' ? 'selected' : '' }}>{{ __('نعم') }}</option>
                                    <option value="no" {{ old('volunteer') == 'no' ? 'selected' : '' }}>{{ __('لا') }}</option>
                                </select>

                            </div>
                        </div>
                        <div class="input-text">

                            <div class="input-div">
                                <input type="text" class="@error('volunteer_details') is-invalid @enderror" value="{{ old('volunteer_details') }}" name="volunteer_details" placeholder="{{ __('إذا نعم، اذكر بإختصار') }}">
                                @error('volunteer_details')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">

                                <select name="skills">
                                    <option value="" {{ old('skills') == "" ? 'selected' : '' }} selected hidden>{{ __('هل لديك أي مهارات أو صفات معينة يمكنك استخدامها في عملك التطوعي') }}</option>
                                    <option value="yes" {{ old('skills') == 'yes' ? 'selected' : '' }}>{{ __('نعم') }}</option>
                                    <option value="no" {{ old('skills') == 'no' ? 'selected' : '' }}>{{ __('لا') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-text">

                            <div class="input-div">
                                <input type="text" class="@error('skills_details') is-invalid @enderror" value="{{ old('skills_details') }}" name="skills_details" placeholder="{{ __('اذكر تطوعك بإختصار') }}">
                                @error('skills_details')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="buttons">
                            <button type="button" class="next_button">{{ __('التالي') }}</button>
                        </div>

                    </div>
                    <div class="main">

                        <div class="text">
                            <h2>معلومات اضافية</h2>
                            <p>الرجاء ادخال البيانات</p>
                        </div>



                        <div class="input-text">
                            <div class="input-div">
                                <input type="date" class="@error('beginning') is-invalid @enderror" value="{{ old('beginning') }}" name="beginning">
                                <span>بداية التطوع</span>
                                @error('beginning')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="date" class="@error('ending') is-invalid @enderror" value="{{ old('ending') }}" name="ending">
                                <span>نهاية التطوع</span>
                                @error('ending')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" class="@error('experience') is-invalid @enderror" value="{{ old('experience') }}" required name="experience" require id="user_name" style="height: 93px;">
                                <span>الخبرة الدراسية</span>
                                @error('experience')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="input-text">
                            <div class="input-div fileinput">
                                <input type="file" class="@error('cv') is-invalid @enderror" value="{{ old('cv') }}" name="cv" accept="image/*, application/pdf, application/msword">
                                <span>السيرة الذاتية</span>
                                @error('cv')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="buttons button_space">
                            <button class="back_button">الرجوع</button>
                            <button type="submit" class="next_button">تسجيل</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection