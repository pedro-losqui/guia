    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="my-5">
                <h3 class="text-dark font-weight-bold mb-10">Empresa/Clínica:</h3>

                <div class="form-group row">
                    <label class="col-3">Empresa</label>
                    <div class="col-9">
                        <select wire:model='company_id' class="form-control @error('company_id') is-invalid @enderror">
                            <option value="">Selecione</option>
                            @foreach($companies->companies as $item)
                                <option value="{{ $item->id }}">{{ $item->corporate_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Clínica</label>
                    <div class="col-9">
                        <select wire:model='partner_id' class="form-control @error('partner_id') is-invalid @enderror">
                            <option value="">Selecione</option>
                            @foreach($partners->partners as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('partner_id')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <h3 class="text-dark font-weight-bold mb-10">Informações do colaborador:</h3>

                <div class="form-group row">
                    <label class="col-3">Atendimento</label>
                    <div class="col-9">
                        <div class="input-group">
                            <select wire:model='service' class="form-control @error('service') is-invalid @enderror">
                                <option value="">Selecione</option>
                                <option value="Admissional">Admissional</option>
                                <option value="Periódico">Periódico</option>
                                <option value="Retorno ao Trabalho">Retorno ao Trabalho</option>
                                <option value="Mudança de Função">Mudança de Função</option>
                                <option value="Demissional">Demissional</option>
                                <option value="Monitoração Pontual/Consulta">Monitoração Pontual/Consulta</option>
                                <option value="Complementares">Complementares</option>
                            </select>
                        </div>
                        @error('service')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">CPF/Nome completo</label>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-id-card"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='cpf' class="form-control @error('cpf') is-invalid @enderror"
                                data-mask="000.000.000-00" placeholder="000.000.000-00" />
                        </div>
                        @error('cpf')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-user-tie"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='employee_name'
                                class="form-control @error('employee_name') is-invalid @enderror"
                                placeholder="Nome do colaborador" />
                        </div>
                        @error('employee_name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Gênero/Data de nascimento</label>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-transgender"></i>
                                </span>
                            </div>
                            <select wire:model='gender' class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Selecione</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        @error('gender')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                </span>
                            </div>
                            <input type="date" wire:model='born_date'
                                class="form-control @error('born_date') is-invalid @enderror" />
                        </div>
                        @error('born_date')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Ambiente de trabalho/Cargo</label>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-building-o"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='department'
                                class="form-control @error('department') is-invalid @enderror"
                                placeholder="Setor do colaborador" />
                        </div>
                        @error('department')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-user-tag"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='post'
                                class="form-control @error('post') is-invalid @enderror"
                                placeholder="Função do colaborador" />
                        </div>
                        @error('post')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
