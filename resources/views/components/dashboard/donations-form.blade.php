<div class="tab-content">
    <div class="tab-pane fade show active" id="kt_general_widget_1_3">
        <!--begin::Tables Widget 5-->
        <div class="card">
            <!--begin::Body-->
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
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Donater name</th>
                                        <th class="min-w-110px text-dark fw-bolder text-hover-primary mb-1 fs-6">Email</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Phone</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Project Type</th>
                                        <th class="min-w-10px text-dark fw-bolder text-hover-primary mb-1 fs-6">Message</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Price</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($donates as $donate)
                                    <tr class="cart-single-list">
                                        <td class="text-muted fw-bold">{{ $donate->donater_name }}</td>
                                        <td class="text-muted fw-bold">{{ $donate->email }}</td>
                                        <td>
                                            <span class="text-muted fw-bold">{{ $donate->phone_number }}</span>
                                        </td>
                                        <td><span class="text-muted fw-bold d-block">{{$donate->project_type}}</span></td>
                                        <td>
                                            <span class="text-muted fw-bold">{{$donate->message}}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted fw-bold" style="font-size:13px;">{{ $donate->price }}</span>
                                        </td>
                                        <td>
                                            <form action="{{ route('dashboard.donates.destroy', $donate->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger remove-item" data-url="{{ route('dashboard.donates.destroy', $donate->id) }}" data-id="{{ $donate->id }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            {{ $donates->withQueryString()->links() }}
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tables Widget 5-->
    </div>
</div>