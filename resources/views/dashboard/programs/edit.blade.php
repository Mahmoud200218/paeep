@extends('layouts.dashboard1')
@section('content')
<form class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate" id="kt_modal_create_project_form" action="{{ route('dashboard.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')
@include('dashboard.programs._form');
</form>
@endsection