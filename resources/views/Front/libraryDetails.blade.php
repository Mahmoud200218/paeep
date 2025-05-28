@extends('layouts.front')
@section('content')
<div class="m-content">
    <div id="DivSpinner"></div>
    <div class="containerr">
        <section class="hedsid">
            <h6><a href="/">الرئسية / </a><a href="/Library">المكتبة المرئية / </a></h6>
        </section>
        <section class="allnewss">
            <div class="newss">
                <h1>{{ $library->title }}</h1>
            </div>
            <div class="textalbomdet">
                <p>{{ $library->description }}<br><br></p>
            </div>
            <div class="allcardlib">
                <div class="cardslaib">
                    <div class="imgbig">
                        <a href="{{ asset('storage/' . $library->cover_image) }}" data-lightbox="mygallery" data-title>
                            <img loading="lazy" src="{{ asset('storage/' . $library->cover_image) }}" alt>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection