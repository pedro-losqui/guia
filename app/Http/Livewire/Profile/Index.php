<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;

    public $checkPermissions = [], $permission_id = [];
    
    public $busca, $block, $permissions;

    public $profile_id, $name;

    protected $rules = [
        'name' => 'required|string', 
    ];

    public function mount()
    {
        $this->default();
        $this->block = false;
    }

    public function render()
    {
        $this->authorize('perfil.ver', Auth::user()->can('perfil.ver'));

        return view('livewire.profile.index', [
            'profiles' => Role::where('name', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorize('perfil.criar', Auth::user()->can('perfil.criar'));

        $this->mount();
        $this->dispatchBrowserEvent('show', ['open' => 'create-profile']);
    }

    public function store()
    {
        $this->uppercase();
        
        Role::create($this->validate());

        $this->dispatchBrowserEvent('hide', ['close' => 'create-profile']);
        $this->dispatchBrowserEvent('success', ['success' => 'Perfil criado com sucesso!']);
        $this->mount();
    }

    public function edit($id)
    {
        $this->authorize('perfil.editar', Auth::user()->can('perfil.editar'));

        $role = Role::find($id);
        
        $this->block = true;

        $this->profile_id   = $role->id;
        $this->name         = $role->name;

        $this->permisions();
        $this->dispatchBrowserEvent('show', ['open' => 'edit-profile']);
    }

    public function update()
    {
        $this->uppercase();

        $data = $this->validate([
            'name'          => 'required|string',
        ]);

        $role = Role::find($this->profile_id);
        $role->update($data);

        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'edit-profile']);
        $this->dispatchBrowserEvent('success', ['success' => 'Perfil '. $role->name . ' atualizado com sucesso!']);
    }

    public function alert($id)
    {
        $this->authorize('perfil.excluir', Auth::user()->can('perfil.excluir'));

        $this->dispatchBrowserEvent('show', ['open' => 'alert-profile']);
        $this->profile_id = $id;
    }

    public function delete()
    {
        $role = Role::find($this->profile_id);
        $role->delete();
        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'alert-profile']);
        $this->dispatchBrowserEvent('success', ['success' => 'Perfil '. $role->name . ' excluido com sucesso!']);
    }

    public function permisions()
    {
        $this->permissions = Permission::all();
        $this->checkPermissions();
    }

    public function addPermisssion($id)
    {
        $role = Role::find($this->profile_id);
        $role->givePermissionTo($id);
        $this->permisions();
    }

    public function removePermisssion($id)
    {
        $role = Role::find($this->profile_id);
        $role->revokePermissionTo($id);
        $this->permisions();
    }

    public function checkPermissions()
    {
        $this->checkPermissions = [];

        $permissions = Role::find($this->profile_id);
        foreach ($permissions->permissions as $item) {
            array_push($this->checkPermissions, $item->name);
        }
    }

    public function uppercase()
    {
        $this->name = ucwords(mb_strtolower($this->name, 'UTF-8'));
    }

    public function default()
    {
        $this->name = '';
    }
}
