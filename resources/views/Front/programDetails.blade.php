@extends('layouts.front')
@section('content')
<div class="containerr">
    <section class="hedsid">
        <h6><a href="index.html">الرئسية / </a><a href="programs.html">البرامج / </a></h6>
        <h6> الإغاثة والتطوير </h6>
    </section>

    <section class="allnewss">
        <div class="newss">
            <h1>{{ $program->title }}</h1>
            <p>{{ $program->description }}</p>
        </div>

        <div class="program_more">

            <h2>البرامج :</h2>

            <div class="allcardnews">

                @foreach ($programs as $program)
                <div class=" card cardNews ">
                    <a href="{{ route('program.details', $program->id) }}"> <img src="{{ asset('storage/' . $program->cover_image) }}" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('program.details', $program->id) }}">{{ $program->title }}</a></h5>
                        <p class="card-text">{{ $program->description }}</p>
                    </div>
                </div>
                @endforeach
                <a href="{{ route('all.programs') }}" class="btn btn-primary">عرض المزيد</a>

            </div>



    </section>

</div>


@endsection