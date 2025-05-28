@extends("layouts.front")
@section('content')
<div class="containerr">
    <section class="hedsid">
        <h6><a href="index.html">{{ __('الرئسية') }} / </a></h6>
        <h6> {{ __('المكتبة المرئية') }} </h6>
    </section>

    <section class="allnewss">
        <div class="newss">
            <h1>{{ __('المكتبات المرئية') }}</h1>
        </div>


        <div class="allcardnews">
            @foreach($libraries as $library)
            <div class=" card cardNews ">
                <a href="{{ route('library.details', $library->id) }}"> <img loading="lazy" src="{{ asset('storage/' . $library->cover_image) }}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <a href="{{ route('library.details', $library->id) }}">
                        <h5 class="card-title">{{ $library->title }}</h5>
                    </a>
                    <p class="card-text">{{ $library->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div style="display: flex; justify-content: center; align-items: center; margin:15px 0">
            {{ $libraries->withQueryString()->links() }}
        </div>
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