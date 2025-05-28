@extends('layouts.front')
@section('content')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-4">
        <div class="border border-3 border-danger"></div>
        <div class="card  bg-white shadow p-5">
            <div class="mb-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="text-danger" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="6" fill="none" stroke-width="2" stroke="currentColor" />
                    <line x1="5" y1="5" x2="11" y2="11" stroke="currentColor" stroke-width="2" />
                    <line x1="5" y1="11" x2="11" y2="5" stroke="currentColor" stroke-width="2" />
                </svg>
            </div>
            <div class="text-center">
                <h1>Sorry, an error occurred !</h1>
                <p>The operation was not successful due to an unknown reason, please try again.</p>
                <a href="{{ route('home') }}"><button class="btn btn-outline-danger">Back Home</button></a>
            </div>
        </div>
    </div>
</div>
@endsection