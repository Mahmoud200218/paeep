<!--begin::Mixed Widget 12-->
<div class="card mb-10">
    <!--begin::Header-->
    <div class="card-header border-0 bg-success py-5">
        <h3 class="card-title fw-bolder text-white">Association Progress</h3>
        <div class="card-toolbar">
            <!--begin::Menu-->
            <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 3-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                <!--begin::Heading-->
                <div class="menu-item px-3">
                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                </div>
                <!--end::Heading-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Create Invoice</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Generate Bill</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                    <a href="#" class="menu-link px-3">
                        <span class="menu-title">Subscription</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--begin::Menu sub-->
                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Plans</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Billing</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Statements</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content px-3">
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                    <!--end::Input-->
                                    <!--end::Label-->
                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                    <!--end::Label-->
                                </label>
                                <!--end::Switch-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu sub-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3 my-1">
                    <a href="#" class="menu-link px-3">Settings</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 3-->
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body p-0">
        <!--begin::Chart-->
        <div class="mixed-widget-12-chart card-rounded-bottom bg-success" data-kt-color="success" style="height: 250px"></div>
        <!--end::Chart-->
        <!--begin::Stats-->
        <div class="card-rounded bg-body mt-n10 position-relative card-px py-15">
            <!--begin::Row-->
            <div class="row g-0 mb-7">
                <!--begin::Col-->
                <div class="col mx-5">
                    <div class="fs-6 text-gray-400">Total donations</div>
                    <div class="fs-2 fw-bolder text-gray-800">{{ App\Models\Front\Donate::count() }}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col mx-5">
                    <div class="fs-6 text-gray-400">Volunteer Requests</div>
                    <div class="fs-2 fw-bolder text-gray-800">{{ App\Models\Front\Volunteer::count() }}</div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row g-0">
                <!--begin::Col-->
                <div class="col mx-5">
                    <div class="fs-6 text-gray-400">Job Requests</div>
                    <div class="fs-2 fw-bolder text-gray-800">{{ App\Models\Front\Job::count() }}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col mx-5">
                    <div class="fs-6 text-gray-400">Company Requests</div>
                    <div class="fs-2 fw-bolder text-gray-800">{{ App\Models\Front\CompaniesRequest::count() }}</div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>
<!--end::Mixed Widget 12-->