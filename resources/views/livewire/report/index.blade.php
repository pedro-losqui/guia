<div wire:ignore.self class="modal fade" id="report-partner" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Relátorio de solicitações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Data inicial:</label>
                                <input type="date" wire:model='from'
                                    class="form-control @error('from') is-invalid @enderror" />
                                @error('from')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Data final:</label>
                                <input type="date" wire:model='to'
                                    class="form-control @error('to') is-invalid @enderror" />
                                @error('to')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold"
                    data-dismiss="modal">Fechar</button>
                <button type="button" wire:click.prevent='generate' class="btn btn-primary font-weight-bold">Gerar
                    relatório</button>
            </div>
        </div>
    </div>
</div>
