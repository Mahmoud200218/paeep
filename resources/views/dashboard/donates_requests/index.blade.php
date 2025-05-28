@extends('layouts.dashboard1')
@section('content')
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="row gy-0 gx-10">
            <div class="col-xl-8">
                <div class="mb-10">
                    <x-tab-nav />
                    <x-dashboard.donations-form :donates="$donates" />
                </div>
            </div>
            <div class="col-xl-4">
                <x-statistics />
                <x-contact-messages :contacts="$contacts" />
            </div>
        </div>
    </div>
</div>
@endsection