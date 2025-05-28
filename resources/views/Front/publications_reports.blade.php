@extends('layouts.front')
@section('content')
<div class="containerr">
    <section class="hedsid">
        <h6><a href="{{ route('home') }}">{{ __('الرئيسية') }} / </a></h6>
        <h6> {{ __('الإصدارات والتقارير') }} </h6>
    </section>

    <section class="allnewss">
        <div class="newss">
            <h1>{{ __('الإصدارات والتقارير') }}</h1>
        </div>

        <div class="allcardnews">
            @foreach($publications as $publication)
            <div class="card cardNews">
                <a href=""> <img loading="lazy" src="{{ asset('storage/' . $publication->cover_image) }}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <a href="">
                        <h5 class="card-title">{{ $publication->title }}</h5>
                    </a>
                    <p class="card-text">{{ $publication->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div style="display: flex; justify-content: center; align-items: center; margin:15px 0">
            {{ $publications->withQueryString()->links() }}
        </div>

    </section>
</div>
<style>
    .allcardspiblicationsss {
        display: flex;
        /* Use flexbox to arrange items in a row */
        justify-content: space-between;
        /* Add space between the items */
    }

    .cardpubb {
        flex: 1;
        /* Distribute available space equally among the items */
        margin-right: 10px;
        /* Add some margin between the items (adjust as needed) */
        border: 1px solid #ddd;
        /* Add a border for visual separation (optional) */
        padding: 10px;
        /* Add padding to each card (optional) */
    }
</style>
@endsection