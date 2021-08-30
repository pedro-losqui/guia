<form class="form" id="kt_form">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="my-5">
                <h3 class="text-dark font-weight-bold mb-10">Informações do usuário:</h3>

                <div class="form-group row">
                    <label class="col-3">Nome completo</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-user"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='name'
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nome do usuário" />
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
                                placeholder="E-mail do usuário" />
                        </div>
                        @error('email')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Senha</label>
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-lock"></i>
                                </span>
                            </div>
                            <input type="password" wire:model='password'
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Senha 6 digitos" />
                        </div>
                        @error('password')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-lock"></i>
                                </span>
                            </div>
                            <input type="password" wire:model='password_confirm'
                                class="form-control @error('password_confirm') is-invalid @enderror"
                                placeholder="Confirmação de senha" />
                        </div>
                        @error('password_confirm')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3">Status</label>
                    <div class="col-9">
                        <select wire:model='status' class="form-control @error('status') is-invalid @enderror">
                            <option value="">Selecione</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
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
                            <option value="Interno">Interno</option>
                            <option value="Externo">Externo</option>
                        </select>
                        @error('type')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            @if($block)
                <div class="separator separator-dashed my-10"></div>
                <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Perfil de acesso:</h3>
                    <div class="form-group row">
                        <label class="col-3">Perfil</label>
                        <div class="col-9">
                            <select wire:model='profile_user' class="form-control">
                                <option value="">Selecione</option>
                                @foreach($profiles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="separator separator-dashed my-10"></div>
                <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Acesso empresa:</h3>
                    <div class="form-group row">
                        <label class="col-3">Empresas</label>
                        <div class="col-9">
                            <select wire:model='company_id' multiple="multiple" class="form-control">
                                @foreach($companies as $item)
                                    <option value="{{ $item->id }}">{{ $item->corporate_name }} {{ $item->cnpj }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="separator separator-dashed my-10"></div>
                <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-10">Acesso Clínicas:</h3>
                    <div class="form-group row">
                        <label class="col-3">Clínicas parceiras</label>
                        <div class="col-9">
                            <select wire:model='partner_id' multiple="multiple" class="form-control">
                                @foreach($partners as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-xl-2"></div>
    </div>
</form>
