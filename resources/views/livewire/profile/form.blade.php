<form class="form" id="kt_form">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <div class="my-5">
                <h3 class="text-dark font-weight-bold mb-10">Informações cadastrais:</h3>

                <div class="form-group row">
                    <label class="col-3">Nome do perfil</label>
                    <div class="col-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-id-badge"></i>
                                </span>
                            </div>
                            <input type="text" wire:model='name'
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nome do perfil" />
                        </div>
                        @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @if($block)
                    <div class="separator separator-dashed my-10"></div>
                    <div class="my-5">
                        <h3 class="text-dark font-weight-bold mb-10">permissões de acesso:</h3>
                        <div class="form-group row">
                            @foreach($permissions as $key => $item)
                                @if(in_array($item->name, $checkPermissions))
                                    <label class="col-3 col-form-label">{{ $item->name }}</label>
                                    <div class="col-3">
                                        <span class="switch switch-outline switch-icon switch-success">
                                            <label>
                                                <input type="checkbox" checked="checked" wire:click="removePermisssion({{ $item->id }})" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                @else
                                    <label class="col-3 col-form-label">{{ $item->name }}</label>
                                    <div class="col-3">
                                        <span class="switch switch-outline switch-icon switch-success">
                                            <label>
                                                <input type="checkbox" wire:click="addPermisssion({{ $item->id }})" />
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</form>
