<div wire:ignore.self class="modal fade" id="update-manage" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualização</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-icon">
                    <div class="form-group mb-2">
                        <div class="input-group">
                            <select wire:model='situation' class="form-control">
                                <option value="">Status</option>
                                <option value="Solicitado">Solicitado</option>
                                <option value="Agendado">Agendado</option>
                                <option value="Recebido">Recebido</option>
                                <option value="Digitado">Digitado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-dismiss="modal">Fechar</button>
                <button type="button" wire:click.prevent='update' class="btn btn-primary font-weight-bold">Atualizar</button>
            </div>
        </div>
    </div>
</div>
