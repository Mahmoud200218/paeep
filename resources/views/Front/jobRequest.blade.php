@extends('layouts.front')
@section('content')
<div class="container">
    <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">

                    </div>
                    <div class="steps-content">
                        <h3><span class="step-number"> </span>{{ __('المعلومات الأساسية') }} </h3>

                    </div>
                    <ul class="progress-bar">
                        <li class="active">{{ __('المعلومات الأساسية') }}</li>
                        <li>{{ __('معلومات إضافية') }}</li>

                    </ul>
                </div>
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
                            <h2>{{ __('اضافة طلب التوظيف') }}</h2>
                            <p>{{ __('الرجاء تعبئة البيانات') }}</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require class="@error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" id="user_name" placeholder="{{ __('الاسم الاول') }}">
                                @error('first_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-div">
                                <input type="text" class="@error('parent_name') is-invalid @enderror" required name="parent_name" value="{{ old('parent_name') }}" placeholder="{{ __('اسم الاب') }}">
                                @error('parent_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" class="@error('grandfather_name') is-invalid @enderror" required require id="user_name" name="grandfather_name" value="{{ old('grandfather_name') }}" placeholder="{{ __('اسم الجد') }}">
                                @error('grandfather_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-div">
                                <input type="text" class="@error('family_name') is-invalid @enderror" required name="family_name" value="{{ old('family_name') }}" placeholder="{{ __('اسم العائلة') }}">
                                @error('family_name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div numinputr">
                                <input type="number" class="@error('phone_number') is-invalid @enderror" required require name="phone_number" value="{{ old('phone_number') }}" placeholder="{{ __('رقم الموبايل') }}">
                                @error('phone_number')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="input-div ">
                                <input type="text" class="@error('email') is-invalid @enderror" required require name="email" value="{{ old('email') }}" placeholder="{{ __('البريد الإلكتروني') }}">
                                @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <select name="gender" style="font-family: 'Cairo', sans-serif;">
                                    <option value="" {{ old('gender') == '' ? 'selected' : '' }} selected hidden>{{ __('اختر الجنس') }}</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('ذكر') }}</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('أنثى') }}</option>
                                </select>
                            </div>
                            <div class="input-div">

                                <select name="qualification" style="font-family: 'Cairo', sans-serif;">
                                    <option value="" {{ old('qualification') == '' ? 'selected' : '' }} selected hidden>{{ __('المؤهل العلمي') }}</option>
                                    <option value="bachelors" {{ old('qualification') == 'bachelors' ? 'selected' : '' }}>{{ __('بكالوريوس') }}</option>
                                    <option value="diploma" {{ old('qualification') == 'diploma' ? 'selected' : '' }}>{{ __('دبلوم') }}</option>
                                    <option value="college_student" {{ old('qualification') == 'college_student' ? 'selected' : '' }}>{{ __('طالب جامعي') }}</option>
                                    <option value="high_school" {{ old('qualification') == 'high_school' ? 'selected' : '' }}>{{ __('ثانوية عامة') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="buttons" style="text-align: left;">
                            <button type="button" class="next_button">{{ __('اضافة') }}</button>
                        </div>

                    </div>
                    <div class="main">
                        <div class="text">
                            <h2>{{ __('معلومات إضافية') }}</h2>
                            <p>{{ __('الرجاء تعبئة البيانات') }}</p>
                        </div>

                        <div class="input-text">
                            <div class="input-div">
                                <input type="date" class="@error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                <span>{{ __('تاريخ الميلاد') }}</span>
                                @error('date_of_birth')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div fileinput">
                                <input type="file" class="@error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}" accept="image/*, application/pdf, application/msword">
                                <span>{{ __('السيرة الذاتية') }}</span>
                                @error('cv')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="buttons button_space">
                            <button type="button" class="back_button">{{ __('الرجوع') }}</button>
                            <button type="submit" class="next_button">{{ __('التالي') }}</button>
                        </div>
                    </div>
                    <!-- <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>Work Experiences</h2>
                            <p>Can you talk about your past work experience?</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require>
                                <span>Experience 1</span>
                            </div>
                            <div class="input-div"> 
                                <input type="text" required require>
                                <span>Position</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required>
                                <span>Experience 2</span>
                            </div>
                            <div class="input-div">
                                <input type="text" required>
                                <span>Position</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required>
                                <span>Experience 3</span>
                            </div>
                            <div class="input-div">
                                <input type="text" required>
                                <span>Position</span>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>
                    </div> -->



                    <!-- <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>User Photo</h2>
                            <p>Upload your profile picture and share yourself.</p>
                        </div>
                        <div class="user_card">
                            <span></span>
                            <div class="circle">
                                <span><img src="https://i.imgur.com/hnwphgM.jpg"></span>
                                
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