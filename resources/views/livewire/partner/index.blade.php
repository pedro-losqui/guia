<div>
    @include('livewire.partner.edit')
    @include('livewire.partner.alert')
    @include('livewire.partner.create')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <ul class="nav nav-light-success nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="javascript:;">
                            <span class="nav-icon">
                                <i class="fas fa-list-ul"></i>
                            </span>
                            <span class="nav-text">Listagem</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" wire:click='create' data-toggle="tab" href="javascript:;">
                            <span class="nav-icon">
                                <i class="fas fa-book-medical"></i>
                            </span>
                            <span class="nav-text">Cadastro</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-toolbar">
                <div class="input-icon">
                    <input style="width: 400px" type="text" wire:model='busca' class="form-control" placeholder="Buscar...">
                    <span>
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom card-stretch mt-5">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Listagem de clínicas</h3>
            </div>
            <div class="card-toolbar">
                Total de registros&nbsp;&nbsp;&nbsp;
                <a href="#" class="btn btn-sm btn-success font-weight-bold">{{ count($partners) }}</a>
            </div>
        </div>
        <div class="card-body">
            @include('livewire.partner.list')
        </div>
    </div>
</div>
