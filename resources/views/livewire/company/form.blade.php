<form class="form">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="my-5">
                <h3 class="text-dark font-weight-bold mb-10">Informações da empresa:</h3>

                <div class="form-group row">
                    <label class="col-3">CNPJ</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-address-card"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='cnpj'
                                class="form-control @error('cnpj') is-invalid @enderror" data-mask="00.000.000/0000-00"
                                placeholder="00.000.000/0000-00" />
                        </div>
                        @error('cnpj')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Razão social</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-building"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='corporate_name'
                                class="form-control @error('corporate_name') is-invalid @enderror"
                                placeholder="Razão social" />
                        </div>
                        @error('corporate_name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Status</label>
                    <div class="col-9">
                        <select wire:model='status' class="form-control @error('status') is-invalid @enderror">
                            <option value="">Selecione</option>
                            <option value="Ativa">Ativa</option>
                            <option value="Inativa">Inativa</option>
                        </select>
                        @error('status')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</form>
