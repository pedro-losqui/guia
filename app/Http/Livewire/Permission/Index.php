<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;
    
    public $busca;
    
    public $permission_id, $name;
    
    public $permission = ['.ver', '.criar', '.editar', '.excluir', '.admin'];

    protected $rules = [
        'name' => 'required|string', 
    ];

    public function mount()
    {
        $this->default();
    }

    public function render()
    {
        $this->authorize('permissão.ver', Auth::user()->can('permissão.ver'));

        return view('livewire.permission.index', [
            'permissions' => Permission::where('name', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorize('permissão.criar', Auth::user()->can('permissão.criar'));

        $this->default();
        $this->dispatchBrowserEvent('show', ['open' => 'create-permission']);
    }

    public function store()
    {
        $this->validate();
        $this->uppercase();
    
        for ($i=0; $i < 5 ; $i++) { 
            Permission::create([
                'name' => $this->name . $this->permission[$i]
            ]);
        }

        $this->dispatchBrowserEvent('hide', ['close' => 'create-permission']);
        $this->dispatchBrowserEvent('success', ['success' => 'Permissões criada com sucesso!']);
        $this->mount();
    }

    public function alert($id)
    {
        $this->authorize('permissão.excluir', Auth::user()->can('permissão.excluir'));

        $this->dispatchBrowserEvent('show', ['open' => 'alert-permission']);
        $this->profile_id = $id;
    }

    public function delete()
    {
        $role = Role::find($this->profile_id);
        $role->delete();
        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'alert-permission']);
        $this->dispatchBrowserEvent('success', ['success' => 'Perfil '. $role->name . ' excluido com sucesso!']);
    }

    public function uppercase()
    {
        $this->name = mb_strtolower($this->name, 'UTF-8');
    }

    public function default()
    {
        $this->name = '';
    }
}
