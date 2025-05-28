@extends('layouts.front')
@section('content')
<div class="m-content">
    <div id="DivSpinner"></div>
    <div class="containerr">
        <section class="hedsid">
            <h6><a href="/">{{ __('الرئيسية') }} / </a></h6>
            <h6> {{ __('برامج الجمعية') }} </h6>
        </section>
        <section class="allnewss">
            <div class="newss">
                <h1> {{ __('برامج الجمعية') }} </h1>
                <form action="/Material/News?type=1" method="get">
                    <div class="serch-news">
                        <i class="bx bx-search"></i>
                        <input type="text" value name="TitleSearch" id="TitleSearch" placeholder="بحث ">
                    </div>
                </form>
            </div>
            <div class="allcardnews">
                @foreach($programs as $program)
                <div class=" card cardNews ">
                    <a href="{{ route('program.details', $program->id) }}"> <img loading="lazy" src="{{ asset('storage/' . $program->cover_image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <a href="{{ route('program.details', $program->id) }}">
                            <h5 class="card-title">{{ $program->title }}</h5>
                        </a>
                        <p class="card-text">{{ $program->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagg">
                {{ $programs->links() }}
            </div>
        </section>
    </div>
</div>

@endsection