<form class="form" id="kt_form">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="my-5">
                <h3 class="text-dark font-weight-bold mb-10">Informações cadastrais:</h3>

                <div class="form-group row">
                    <label class="col-3">Permissão</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='name'
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Permissão" />
                        </div>
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</form>
