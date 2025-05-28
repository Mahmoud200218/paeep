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
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Organization name</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Type organization</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Main address</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Year founded</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Website</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Instagram</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Facebook</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Annual budget</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">#Centers</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">#Employees</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Locations</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">#Registeration/ministry of interior</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">#Registeration/ministry of finance</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">#Current projects</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Major donors</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Total Employees</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Nationalities beneficiaries</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Ages beneficiaries</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Main strategic objectives</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Registration certificate</th>
                                        <th class="min-w-150px text-dark fw-bolder text-hover-primary mb-1 fs-6">Structure organisationnelle</th>

                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach($companies as $company)
                                    <tr class="cart-single-list">
                                        <td class="text-muted fw-bold">{{ $company->organization_name }}</td>
                                        <td class="text-muted fw-bold">{{ $company->type_of_organization }}</td>
                                        <td>
                                            <span class="text-muted fw-bold">{{ $company->main_address }}</span>
                                        </td>
                                        <td><span class="text-muted fw-bold d-block">{{$company->year_founded}}</span></td>
                                        <td>
                                            <span class="badge badge-light-primary"><a href="{{$company->website}}">{{$company->website}}</a></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-light-primary"><a href="{{ $company->instagram }}">{{ $company->instagram }}</a></span>
                                        </td>
                                        <td>
                                            <span class="badge badge-light-primary"><a href="{{$company->facebook}}">{{$company->facebook}}</a></span>
                                        </td>
                                        <td style="min-width:100px;">
                                            <span class="text-muted fw-bold">{{ $company->annual_budget }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted fw-bold">{{ $company->number_of_centers }}</span>
                                        </td>
                                        <td>{{ $company->number_of_employees }}</td>
                                        <td>{{ $company->center_locations }}</td>
                                        <td>{{ $company->registration_number_with_the_ministry_of_interior }}</td>
                                        <td>{{ $company->registration_number_with_the_ministry_of_finance }}</td>
                                        <td>{{ $company->number_of_current_projects }}</td>
                                        <td>{{ $company->major_donors_of_projects }}</td>
                                        <td>{{ $company->total_number_of_employees }}</td>
                                        <td>{{ $company->nationalities_of_beneficiaries }}</td>
                                        <td>{{ $company->age_group_of_beneficiaries }}</td>
                                        <td>{{ $company->main_strategic_objectives }}</td>
                                        <td><a href="{{ asset('storage/' . $company->registration_certificate) }}" class="badge badge-light-primary">{{ $company->registration_certificate }}</a></td>
                                        <td><a href="{{ asset('storage/' . $company->structure_organisationnelle) }}" class="badge badge-light-primary">{{ $company->structure_organisationnelle }}</a></td>

                                        <td>
                                            <form action="{{ route('dashboard.companiesRequest.destroy', $company->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger remove-item" data-url="{{ route('dashboard.companiesRequest.destroy', $company->id) }}" data-id="{{ $company->id }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            {{ $companies->withQueryString()->links() }}
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