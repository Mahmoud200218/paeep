@extends('layouts.front')
@section('content')
<div class="m-content">
    <div id="DivSpinner"></div>
    <div class="containerr">
        <section class="hedsid">
            <h6><a href="/">الرئسية / </a></h6>
            <h6> أخبار الجمعية </h6>
        </section>
        <section class="allnewss">
            <div class="newss">
                <h1>أخبار الجمعية </h1>
                <form action="{{ URL::current() }}" method="get">
                    <div class="serch-news">
                        <i class="bx bx-search"></i>
                        <input type="text" value="{{ request('title') }}" name="title" id="title" placeholder="بحث">
                    </div>
                </form>

            </div>
            <div class="allcardnews">
                @foreach($events as $event)
                <div class=" card cardNews ">
                    <a href="{{ route('event.details', $event->id) }}"> <img loading="lazy" src="{{ asset('storage/' . $event->cover_image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <a href="{{ route('event.details', $event->id) }}">
                            <h5 class="card-title">{{ $event->title }}</h5>
                        </a>
                        <p class="card-text">{{ $event->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagg">
                {{ $events->withQueryString()->links() }}
            </div>
        </section>
    </div>
</div>

@endsection