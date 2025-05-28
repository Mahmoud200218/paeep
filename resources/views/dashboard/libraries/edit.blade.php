@extends('layouts.dashboard1')
@section('content')
<form class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate" id="kt_modal_create_project_form" action="{{ route('dashboard.libraries.update', $library->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')
@include('dashboard.libraries._form');
</form>
@endsection