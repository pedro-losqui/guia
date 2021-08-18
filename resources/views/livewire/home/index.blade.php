<div>
    <div class="d-flex flex-row">
        <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
            <div class="card card-custom card-stretch">
                <div class="card-body pt-4">
                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                            <div class="symbol-label" style="background-image:url('assets/media/users/blank.png')">
                            </div>
                            <i class="symbol-badge bg-success"></i>
                        </div>
                        <div>
                            <a href="#"
                                class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
                            <div class="text-muted">Usuário: {{ Auth::user()->type }}</div>
                        </div>
                    </div>

                    <div class="py-9">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="font-weight-bold mr-2">E-mail:</span>
                            <a href="#" class="text-muted text-hover-primary"> {{ Auth::user()->email }}</a>
                        </div>
                        <hr>
                        <span class="font-weight-bold mr-2">Empresas:</span>
                        @foreach($user->companies as $item)
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="text-muted">{{ $item->corporate_name }}</span>
                            </div>
                        @endforeach
                        <hr>
                        <span class="font-weight-bold mr-2">Clínica:</span>
                        @foreach($user->partners as $item)
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="text-muted">{{ $item->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-row-fluid ml-lg-8">
            <div class="card card-custom">
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark mt-3">Informações</h3>
                    </div>
                </div>
            </div>

            <div class="container py-8">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-primary svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                        fill="#000000" />
                                                    <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1" />
                                                    <path
                                                        d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="javascript:;"
                                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Empresa(s)</a>
                                        <div class="text-dark-75">{{ count($user->companies) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-success svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z"
                                                        fill="#000000" />
                                                    <path
                                                        d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="javascript:;"
                                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Clínica(s)</a>
                                        <div class="text-dark-75">{{ count($user->partners) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-success svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                        fill="#000000" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7"
                                                        height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7"
                                                        height="2" rx="1" />
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="javascript:;"
                                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Solicitações</a>
                                        <div class="text-dark-75">{{ count($amount) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
