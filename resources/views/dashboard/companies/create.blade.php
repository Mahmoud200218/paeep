@extends('layouts.dashboard1')
@section('content')
<form class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate" id="kt_modal_create_project_form" action="{{ route('dashboard.companies.store') }}" method="POST" enctype="multipart/form-data">
@csrf
@include('dashboard.companies._form');
</form>
@endsection