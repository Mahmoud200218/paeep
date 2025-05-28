<div class="tab-content">
    <div class="tab-pane fade show active" id="kt_general_widget_1_3">
        <!--begin::Tables Widget 5-->
        <div class="card">
            <div class="card-body py-3">
                <div class="tab-content">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                        <!--begin::Table container-->
                        <x-flashmessage />
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th class="min-w-150px">Address/Phone</th>
                                        <th class="w-50px">Former/V</th>
                                        <th class="min-w-140px">Skills</th>
                                        <th class="min-w-110px">Beginning</th>
                                        <th class="min-w-110px">Ending</th>
                                        <th>CV</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($volunteers as $volunteer)
                                    <tr class="cart-single-list">
                                        <td>{{ $volunteer->full_name }}</td>
                                        <td>{{ $volunteer->email }}</td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $volunteer->address }}</a>
                                            <span class="text-muted fw-bold d-block">{{$volunteer->phone_number}}</span>
                                        </td>
                                        @if($volunteer->volunteer == 'yes')
                                        <td class="text-end">
                                            <span class="badge badge-light-success">{{$volunteer->volunteer}}</span>
                                        </td>
                                        @else
                                        <td class="text-end">
                                            <span class="badge badge-light-danger">{{$volunteer->volunteer}}</span>
                                        </td>
                                        @endif

                                        @if($volunteer->skills == 'yes')
                                        <td class="text-end">
                                            <span class="badge badge-light-success">{{$volunteer->skills}}</span>
                                        </td>
                                        @else
                                        <td class="text-end">
                                            <span class="badge badge-light-danger">{{$volunteer->skills}}</span>
                                        </td>
                                        @endif
                                        <td style="min-width:100px;">
                                            <span class="text-muted fw-bold" style="font-size:11px;">{{ $volunteer->beginning }}</span>
                                        </td>
                                        <td style="min-width:100px;">
                                            <span class="text-muted fw-bold" style="font-size:11px;">{{ $volunteer->ending }}</span>
                                        </td>
                                        @if($volunteer->cv)
                                        <td><a href="{{ asset('storage/' . $volunteer->cv) }}">{{ $volunteer->cv }}</a></td>
                                        @endif
                                        <td>
                                            <form action="{{ route('dashboard.volunteers.destroy', $volunteer->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger remove-item" data-url="{{ route('dashboard.volunteers.destroy', $volunteer->id) }}" data-id="{{ $volunteer->id }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            {{ $volunteers->withQueryString()->links() }}
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Tap pane-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tables Widget 5-->
    </div>
</div>