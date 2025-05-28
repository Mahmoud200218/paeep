<div class="tab-content">
    <div class="tab-pane fade show active" id="kt_general_widget_1_3">
        <!--begin::Tables Widget 5-->
        <div class="card">
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <div class="tab-content">
                    <!--begin::Tap pane-->
                    <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                        <!--begin::Table container-->
                        <x-flashmessage />
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="users" class="table table-bordered">
                                <thead>
                                    <tr class="border-0">
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 min-w-150px"></th>
                                        <th class="p-0 min-w-140px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($programs as $program)
                                    <tr class="cart-single-list">
                                        <td>
                                            <div class="symbol symbol-45px me-2">
                                                <span class="symbol-label">
                                                    <img src="{{ asset('storage/' . $program->cover_image) }}" class="h-50 align-self-center" alt="" />
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $program->title }}</a>
                                            <span class="text-muted fw-bold d-block">{{$program->description}}</span>
                                        </td>

                                        <td>
                                            <a href="{{ route('dashboard.programs.edit', $program->id) }}"><button class="btn btn-sm btn-primary">Edit</button></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('dashboard.programs.destroy', $program->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger remove-item" data-url="{{ route('dashboard.programs.destroy', $program->id) }}" data-id="{{ $program->id }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $programs->withQueryString()->links() }}
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