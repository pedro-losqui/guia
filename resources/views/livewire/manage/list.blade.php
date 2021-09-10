@foreach($requests as $item)
    <div class="card card-custom gutter-b">
        <div class="separator separator-dashed separator-border-2"></div>
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-shrink-0 mr-7">
                    <div class="symbol symbol-50 symbol-lg-120">
                        <span class="svg-icon svg-icon-{{ $item->status === "Valida" ? 'primary' : 'danger'  }} svg-icon-7x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="flex-grow-1">
                    <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                        <div class="mr-3">
                            <a href="javascript:;"
                                class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $item->employee_name }}
                                @if ($item->status === 'Valida')
                                    <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                @else
                                    <i class="flaticon-circle text-danger icon-md ml-2"></i></a> 
                                @endif
                            <div class="d-flex flex-wrap my-2">
                                <a href="javascript:;"
                                    class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                        class="fa far fa-id-card mr-1"></i> {{ $item->cpf }}</a>
                                <a href="javascript:;"
                                    class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                        class="fas fa-transgender mr-1"></i> {{ $item->gender }}</a>
                                <a href="javascript:;" class="text-muted text-hover-primary font-weight-bold"><i
                                        class="far fa-calendar-alt mr-1"></i>
                                    {{ date("d/m/Y", strtotime($item->born_date)) }}</a>
                                <a href="javascript:;" class="text-muted text-hover-primary font-weight-bold">
                            </div>
                        </div>
                        <div class="my-lg-0 my-1">
                            @if ($item->status === "Valida")
                            <a href="javascript:;" wire:click='situation({{ $item->id }})' class="btn btn-icon btn-warning btn-sm mr-2">
                                <i class="flaticon2-reload"></i>
                            </a>
                            <a href="javascript:;" wire:click='alert({{ $item->id }})' class="btn btn-icon btn-danger btn-sm mr-2">
                                <i class="flaticon-delete"></i>
                            </a>
                            @endif
                            <a href="javascript:;"
                                class="btn btn-sm btn-primary font-weight-bolder text-uppercase">{{ $item->protocol }}</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center flex-wrap justify-content-between">
                        <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                            <a href="javascript:;"
                                class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                    class="fas fa-inbox mr-1"></i> {{ $item->service }}</a>
                            <a href="javascript:;"
                                class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2 ml-5"><i
                                    class="fas fa-city mr-1"></i> {{ $item->department }}</a>
                            <a href="javascript:;"
                                class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2 ml-5"><i
                                    class="fas fa-user-tag mr-1"></i> {{ $item->post }}</a>
                        </div>
                        <div class="d-flex mt-4 mt-sm-0">
                            <span class="font-weight-bold mr-4">{{ $item->situation }}</span>
                            <div class="progress progress-xs mt-2 mb-2 flex-shrink-0 w-150px w-xl-250px">
                                <div class="progress-bar bg-" role="progressbar" style="width: @switch($item->situation)
                                        @case('Solicitado')
                                                20%
                                            @break
                                        @case('Agendado')
                                                50%
                                            @break
                                        @case('Recebido')
                                                70%
                                            @break
                                        @case('Digitado')
                                                100%
                                            @break
                                        @default
                                    @endswitch"
                                                    aria-valuenow=" 50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="font-weight-bolder text-dark ml-4">
                                @switch($item->situation)
                                    @case('Solicitado')
                                        20%
                                    @break
                                    @case('Agendado')
                                            50%
                                        @break
                                    @case('Recebido')
                                            70%
                                        @break
                                    @case('Digitado')
                                            100%
                                        @break
                                    @default
                                @endswitch
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator separator-solid my-7"></div>
                
            @forelse($item->exams as $exams)
                <a href="javascript:;"
                    class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2 ml-5"><i
                        class="fas fa-vial mr-1"></i> {{ $exams->name }}</a>
            @empty
                <h6>N/A</h6>
            @endforelse

            <div class="separator separator-solid my-7"></div>
            
            <div class="d-flex align-items-center flex-wrap">
                <div style="margin-left: 2%" class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                    <span class="mr-4">
                        <i class="far fa-building icon-3x"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Empresa/CNPJ:
                            {{ $item->company->cnpj }}</span>
                        <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold"></span>{{ $item->company->corporate_name }}
                        </span>
                    </div>
                    <span style="margin-left: 4%" class="mr-4">
                        <i class="fas fa-briefcase-medical icon-3x"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Clínica:</span>
                        <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold"></span>{{ $item->partner->name }}</span>
                    </div>
                    <span style="margin-left: 4%" class="mr-4">
                        <i class="fas fa-address-book icon-3x"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Solicitado por:</span>
                        <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold"></span>{{ $item->user->name }} | {{ $item->created_at->format('d/m/Y') }} </span>
                    </div>
                </div>
            </div>
            <div class="separator separator-solid my-7"></div>
        </div>
        <div class="separator separator-dashed separator-border-2"></div>
    </div>
@endforeach
