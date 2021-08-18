<head>
    <meta charset="utf-8" />
    <title>CMA - Relatório de solicitações</title>
    <meta name="description" content="Invoice example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css?v=7.0.5') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css?v=7.0.5') }}" rel="stylesheet"
        type="text/css" />
</head>

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">

                    <div class="col-md-9">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                            <h1 class="display-5 font-weight-boldest mb-10">RELATÓRIO</h1>
                            <div class="d-flex flex-column align-items-md-end px-0">
                                <a href="#" style="color: black" class="mb-2">
                                    <h5>CMA - Saúde e Segurança do Trabalho</h5>
                                </a>
                                <span class="d-flex flex-column align-items-md-end opacity-70">
                                    <span>Relátorio de solicitações: </span>
                                </span>
                            </div>
                        </div>
                        <br>
                        @foreach($results as $item)
                        <hr>
                            <small><strong>Solicitado por:</strong> {{ $item->user->name }}</small>
                            
                            <br>
                            
                            <small><strong>Protocolo:</strong> {{ $item->protocol }} |</small>
                            <small><strong>Atendimento:</strong> {{ $item->service }} |</small>
                            <small><strong>Data da Solicitação:</strong> {{ $item->created_at->format("d/m/Y") }}</small>

                            <br>

                            <small><strong>CPF:</strong> {{ $item->cpf }} |</small>
                            <small><strong>Nome:</strong> {{ $item->employee_name }} |</small>
                            <small><strong>Sexo:</strong> {{ $item->gender }} |</small>
                            <small><strong>Data de nascimento:</strong> {{ date("d/m/Y", strtotime($item->born_date)) }}</small>

                            <br>

                            <small><strong>Empresa:</strong> {{ $item->company->corporate_name }} |</small>
                            <small><strong>Clínica:</strong> {{ $item->partner->name }} |</small>
                            <small><strong>Setor:</strong> {{ $item->department }} |</small>
                            <small><strong>Cargo:</strong> {{ $item->post }}</small>
                        <hr>
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
