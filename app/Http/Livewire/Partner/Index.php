<?php

namespace App\Http\Livewire\Partner;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;

    public $busca, $amount;

    public $partner_id, $name, $email, $status, $type, $telephone, $cell_phone, $sla;

    protected $rules = [
        'name' => 'required|string', 
        'email' => 'required|email', 
        'status' => 'required|string', 
        'type' => 'required|string', 
        'telephone' => '', 
        'cell_phone' => '', 
        'sla' => '',
    ];

    public function mount()
    {
        $this->default();
    }

    public function render()
    {
        $this->authorize('parceiro.ver', Auth::user()->can('parceiro.ver'));

        return view('livewire.partner.index', [
            'partners' => Partner::where('name', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorize('parceiro.criar', Auth::user()->can('parceiro.criar'));

        $this->default();
        $this->dispatchBrowserEvent('show', ['open' => 'create-partner']);
    }

    public function store()
    {
        $this->uppercase();
        
        $partner = Partner::create($this->validate());

        $this->dispatchBrowserEvent('hide', ['close' => 'create-partner']);
        $this->dispatchBrowserEvent('success', ['success' => 'Clinica Parceira '. $partner->name . ' cadastrada com sucesso!']);
        $this->mount();
    }

    public function edit($id)
    {
        $this->authorize('parceiro.editar', Auth::user()->can('parceiro.editar'));

        $partner = Partner::find($id);
        $this->partner_id   = $partner->id;
        $this->name         = $partner->name;
        $this->email        = $partner->email;
        $this->status       = $partner->status;
        $this->type         = $partner->type;
        $this->telephone    = $partner->telephone;
        $this->cell_phone   = $partner->cell_phone;
        $this->sla          = $partner->sla;

        $this->dispatchBrowserEvent('show', ['open' => 'edit-partner']);

    }

    public function update()
    {
        $this->uppercase();

        $data = $this->validate([
            'name'          => 'required|string',
            'email'         => 'required|email',
            'status'        => 'required|string',
            'type'          => 'required|string',
            'telephone'     => '',
            'cell_phone'    => '',
            'sla'           => '',
        ]);

        $partner = Partner::find($this->partner_id);
        $partner->update($data);

        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'edit-partner']);
        $this->dispatchBrowserEvent('success', ['success' => 'Clinica parceira '. $partner->name . ' atualizada com sucesso!']);
    }

    public function alert($id)
    {
        $this->authorize('parceiro.excluir', Auth::user()->can('parceiro.excluir'));

        $this->dispatchBrowserEvent('show', ['open' => 'alert-partner']);
        $this->partner_id = $id;
    }

    public function delete()
    {
        $partner = Partner::find($this->partner_id);
        $partner->delete();
        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'alert-partner']);
        $this->dispatchBrowserEvent('success', ['success' => 'Clinica parceira '. $partner->name . ' excluida com sucesso!']);
    }

    public function uppercase()
    {
        $this->name = mb_strtoupper($this->name, 'UTF-8');
    }

    public function clear()
    {
        $this->busca = '';
    }

    public function default()
    {
        $this->name           = '';
        $this->email          = '';
        $this->status         = '';
        $this->type           = '';
        $this->telephone      = '';
        $this->cell_phone     = '';
        $this->sla            = '';
    }
}
