<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Company;
use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;

    public $busca, $amount, $block;
    
    public $company_id, $partner_id, $companies, $partners, $profiles;

    public $user_id, $name, $email, $password, $password_confirm, $status, $type, $profile_user;

    protected $rules = [
        'name'              => 'required|min:4',
        'email'             => 'required|email|unique:users',
        'password'          => 'required|string|min:6',
        'password_confirm'  => 'required|same:password',
        'status'            => 'required|string',
        'type'              => 'required|string',
    ];

    public function mount()
    {
        $this->block = false;
        $this->default();
    }

    public function render()
    {
        $this->authorize('usuário.ver', Auth::user()->can('usuário.ver'));

        return view('livewire.user.index', [
            'users' => User::where('name', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorize('usuário.criar', Auth::user()->can('usuário.criar'));

        $this->default();
        $this->dispatchBrowserEvent('show', ['open' => 'create-user']);
    }

    public function store()
    {
        $this->validate();

        $this->uppercase();
        
        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'status'   => $this->status,
            'type'     => $this->type,
        ]);

        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'create-user']);
        $this->dispatchBrowserEvent('success', ['success' => 'Usuário '. $user->name . ' cadastrado com sucesso!']);
    }

    public function edit($id)
    {
        $this->authorize('usuário.editar', Auth::user()->can('usuário.editar'));

        $this->profile();
        $this->company();
        $this->partner();

        
        $user = User::find($id);

        $this->user_id       = $user->id;
        $this->name          = $user->name;
        $this->email         = $user->email;
        $this->status        = $user->status;
        $this->type          = $user->type;

        $this->block = true;

        $this->dispatchBrowserEvent('show', ['open' => 'edit-user']);

    }

    public function update()
    {
        $this->uppercase();

        $data = $this->validate([
            'user_id'      => 'required',
            'email'        => 'required|string|unique:users,email, '. $this->user_id,
            'name'         => 'required|string',
            'status'       => 'required|string',
            'type'         => 'required|string',
            'profile_user' => '',
        ]);

        $user = User::find($this->user_id);

        if ($this->password) {
            $data = $this->validate([
                'password'          => 'required|string',
                'password_confirm'  => 'required|same:password',
            ]);
            $user->password = Hash::make($this->password);
            $user->update();
        }

        if ($this->profile_user) {
            $user->assignRole($this->profile_user);
        }

        $user->update($data);

        if ($this->company_id) {
            $this->companySync();
        }

        if ($this->partner_id) {
            $this->partnerSync();
        }

        $this->dispatchBrowserEvent('hide', ['close' => 'edit-user']);
        $this->dispatchBrowserEvent('success', ['success' => 'Usuário '. $user->name . ' atualizado com sucesso!']);
        $this->mount();
    }

    public function alert($id)
    {
        $this->authorize('usuário.excluir', Auth::user()->can('usuário.excluir'));

        $this->dispatchBrowserEvent('show', ['show' => 'alert-user']);
        $this->user_id = $id;
    }

    public function delete()
    {
        $user = User::find($this->user_id);
        $user->delete();
        $this->dispatchBrowserEvent('success', ['success' => 'Usuário '. $user->name . ' excluido com sucesso!']);
        $this->mount();
    }

    public function profile()
    {
        $this->profiles = Role::all(); 
    }

    public function company()
    {
        $this->companies = Company::where('status', 'Ativa')->get(); 
    }

    public function companySync()
    {
        $user = User::find($this->user_id);
        $user->companies()->sync($this->company_id);
    }

    public function partner()
    {
        $this->partners = Partner::where('status', 'Ativa')->get(); 
    }

    public function partnerSync()
    {
        $user = User::find($this->user_id);
        $user->partners()->sync($this->partner_id);
    }

    public function uppercase()
    {
        $this->name = ucwords(mb_strtolower($this->name, 'UTF-8'));
    }

    public function default()
    {
        $this->user_id  = '';
        $this->name     = '';
        $this->email    = '';
        $this->password = '';
        $this->password_confirm = '';
        $this->status   = '';
        $this->type     = '';
    }
}
