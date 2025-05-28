<div class="tab-content">
    <div class="tab-pane fade show active" id="kt_general_widget_1_3">
        <div class="card">
            <div class="card-body py-3">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                        <!--begin::Table container-->
                        <x-flashmessage />
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">First name</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Parent name</th>
                                        <th class="min-w-10px text-dark fw-bolder text-hover-primary mb-1 fs-6">Grandfather</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Family name</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Phone</th>
                                        <th class="min-w-110px text-dark fw-bolder text-hover-primary mb-1 fs-6">Email</th>
                                        <th class="min-w-110px text-dark fw-bolder text-hover-primary mb-1 fs-6">Gender</th>
                                        <th class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Qualification</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Date of birth</th>
                                        <th class="text-dark fw-bolder text-hover-primary mb-1 fs-6">CV</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($jobs as $job)
                                    <tr class="cart-single-list">
                                        <td class="text-muted fw-bold">{{ $job->first_name }}</td>
                                        <td class="text-muted fw-bold">{{ $job->parent_name }}</td>
                                        <td>
                                            <span class="text-muted fw-bold">{{ $job->grandfather_name }}</span>
                                        </td>
                                        <td><span class="text-muted fw-bold d-block">{{$job->family_name}}</span></td>
                                        <td>
                                            <span class="text-muted fw-bold">{{$job->phone_number}}</span>
                                        </td>
                                        <td style="min-width:100px;">
                                            <span class="text-muted fw-bold" style="font-size:11px;">{{ $job->email }}</span>
                                        </td>
                                        @if($job->gender == 'male')
                                        <td class="text-end">
                                            <span class="badge badge-light-success">{{$job->gender}}</span>
                                        </td>
                                        @else
                                        <td class="text-end">
                                            <span class="badge badge-light-danger">{{$job->gender}}</span>
                                        </td>
                                        @endif
                                        <td style="min-width:100px;">
                                            <span class="text-muted fw-bold">{{ $job->qualification_name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted fw-bold" style="font-size:11px;">{{ $job->date_of_birth }}</span>
                                        </td>
                                        @if($job->cv)
                                        <td><a href="{{ asset('storage/' . $job->cv) }}">{{ $job->cv }}</a></td>
                                        @endif
                                        <td>
                                            <form action="{{ route('dashboard.jobs.destroy', $job->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger remove-item" data-url="{{ route('dashboard.jobs.destroy', $job->id) }}" data-id="{{ $job->id }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            {{ $jobs->withQueryString()->links() }}
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>