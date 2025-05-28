@extends('layouts.front')
@section('content')
<div class="containerr">
  <section class="hedsid">
    <h6><a href="index.html">{{ __('الرئيسية') }} / </a></h6>
    <h6> {{ __('تواصل معنا') }} </h6>
  </section>
  <section class="aboutt">
    <x-form-errors />
    <x-flashmessage />
    <h1> {{ __('اتصل بنا') }} </h1>

    <form action="{{ route('contact.store') }}" method="POST">
      @csrf
      <div class="body_cotact">
        <div class="right_contact">
          <div class="input_name">
            <input type="text" class="@error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" placeholder="{{ __('الاسم كامل') }}">
            @error('fullname')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            <input type="text" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('البريد الإلكتروني') }}">
            @error('email')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
          </div>
          <textarea class="@error('description') is-invalid @enderror" name="description" id="" cols="30" rows="10" placeholder="{{ __('رسالتك') }}">{{ @old('description') }}</textarea>
          @error('description')
          <p class="invalid-feedback">{{ $message }}</p>
          @enderror
          <div class="checkbox_text">
            <input class="form-check-input" type="checkbox" name="policy" value="1" id="flexCheckDefault">
            <p>{{ __('أوافق على سياسة الخصوصية') }}</p>
          </div>
          <button type="submit" class="btn_donate">{{ __('إرسال') }}</button>
        </div>
        <div class="left_contact">
          <h1>{{ __('معلومات التواصل') }}</h1>
          <div class="line_contant"></div>

          <div class="icon_text_contact">
            <div class="imgd">
              <img src="{{ asset('assets/imges/Group 7904.png') }}" alt="">
            </div>

            <p>972-592616000+</p>
          </div>
          <div class="icon_text_contact">
            <div class="imgd">
              <img src="{{ asset('assets/imges/Group 7903.png') }}" alt="">
            </div>
            <p>admin@paeep.ps</p>
          </div>
          <div class="icon_text_contact">
            <div class="imgd">
              <img src="{{ asset('assets/imges/Path 5860.png') }}" alt="">
            </div>
            <p>{{ __('غزة-فلسطين-الرمال-شارع عمرو بن العاص') }}<br>
              {{ __('مقابل مدرسة المامونية خلف معلب') }}<br>
              {{ __('فلسطين') }}
            </p>
          </div>

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
                  <i class='bx bx-lemon'></i>
                </div>
              </div>
            </a>
          </div>

        </div>
      </div>
    </form>
  </section>
</div>
@endsection