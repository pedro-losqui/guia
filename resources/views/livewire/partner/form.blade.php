<form class="form" id="kt_form">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="my-5">
                <h3 class="text-dark font-weight-bold mb-10">Informações da clínica:</h3>

                <div class="form-group row">
                    <label class="col-3">Nome da clínica</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-user"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='name'
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nome da clínica" />
                        </div>
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">E-mail</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-envelope"></i>
                                </span>
                            </div>
                            <input type="email" wire:model='email'
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="E-mail da clínica" />
                        </div>
                        @error('email')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Telefone</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='telephone' data-mask="(00) 0000-0000"
                                class="form-control" placeholder="Telefone da clínica" />
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Celular</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-mobile-phone"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='cell_phone'
                                class="form-control" data-mask="(00) 00000-0000" placeholder="Celular da clínica" />
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">sla</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                            <input type="number" wire:model='sla'
                                class="form-control" placeholder="Tempo para retorno" />
                        </div>
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

                <div class="form-group row">
                    <label class="col-3">Tipo</label>
                    <div class="col-9">
                        <select wire:model='type' class="form-control @error('type') is-invalid @enderror">
                            <option value="">Selecione</option>
                            <option value="Parceiro">Parceiro</option>
                            <option value="Não Parceiro">Não Parceiro</option>
                        </select>
                        @error('type')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</form>
