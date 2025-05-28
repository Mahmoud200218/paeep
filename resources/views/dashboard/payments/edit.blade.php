@extends('layouts.dashboard1')
@section('content')
<form class="mx-auto w-100 mw-600px pt-15 pb-10" novalidate="novalidate" id="kt_modal_create_project_form" action="{{ route('dashboard.payments.update', $method->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <fieldset>
        <legend>Basic Informations</legend>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $method->name) }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="active" {{ $method->status == 'active'? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $method->status == 'inactive'? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </fieldset>

    <fieldset>
        <legend>Options</legend>
        @foreach($options as $key => $option)
        <div class="form-group">
            <label for="{{ $key }}">{{ $option['label'] }}</label>
            <input type="text" name="options[{{ $key }}]" id="{{ $key }}" class="form-control" value="{{ $method->options[$key] }}">
            @endforeach
        </div>
    </fieldset>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Update</button>
    </div>
</form>
@endsection