<div>
    @include('livewire.manage.alert')
    @include('livewire.manage.update')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <div class="form-group mb-2 mt-3">
                    <div class="input-group">
                        <input type="date" wire:model='from' class="form-control">
                        <input type="date" wire:model='to' class="form-control">
                    </div>
                </div>
            </div>

            <div class="card-toolbar">
                <div class="input-icon">
                    <div class="form-group mb-2 mr-2 mt-3">
                        <div style="width: 390px" class="input-group">
                            <select wire:model='rstatus' class="form-control">
                                <option value="Valida">Válida</option>
                                <option value="Invalida">Inválida</option>
                            </select>
                            <select wire:model='rsituation' class="form-control">
                                <option value="Solicitado">Solicitado</option>
                                <option value="Agendado">Agendado</option>
                                <option value="Recebido">Recebido</option>
                                <option value="Digitado">Digitado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="card-title">
            </div>
            <div class="card-toolbar">
                <div class="input-icon">
                    <input style="width: 400px" type="text" wire:model='busca' class="form-control"
                        placeholder="Buscar...">
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
                <h3 class="card-label">Listagem de solicitações</h3>
            </div>
            <div class="card-toolbar">
                Total de registros&nbsp;&nbsp;&nbsp;
                <a href="#" class="btn btn-sm btn-success font-weight-bold">{{ count($requests) }}</a>
            </div>
        </div>
        <div class="card-body">
            @include('livewire.manage.list')
        </div>
    </div>
</div>
