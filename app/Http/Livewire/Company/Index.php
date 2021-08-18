<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;

    public $busca, $amount;
    
    public $company_id, $cnpj, $corporate_name, $status;

    protected $rules = [
        'cnpj'              => 'required|min:4|cnpj|unique:companies',
        'corporate_name'    => 'required|min:4',
        'status'            => 'required|string',
    ];

    public function mount()
    {
        $this->default();
    }

    public function render()
    {
        $this->authorize('empresa.ver', Auth::user()->can('empresa.ver'));

        return view('livewire.company.index', [
            'companies' => Company::where('cnpj', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorize('empresa.criar', Auth::user()->can('empresa.criar'));

        $this->default();
        $this->dispatchBrowserEvent('show', ['open' => 'create-company']);
    }

    public function store()
    {
        $this->uppercase();
        
        $company = Company::create($this->validate());

        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'create-company']);
        $this->dispatchBrowserEvent('success', ['success' => 'Empresa '. $company->corporate_name . ' cadastrada com sucesso!']);
    }

    public function edit($id)
    {
        $this->authorize('empresa.editar', Auth::user()->can('empresa.editar'));

        $company = Company::find($id);
        $this->company_id           = $company->id;
        $this->cnpj                 = $company->cnpj;
        $this->corporate_name       = $company->corporate_name;
        $this->status               = $company->status;

        $this->dispatchBrowserEvent('show', ['open' => 'edit-company']);
    }

    public function update()
    {
        $this->uppercase();

        $data = $this->validate([
            'cnpj'              => 'required|min:4|cnpj|unique:companies,cnpj, '. $this->company_id,
            'corporate_name'    => 'required|min:4',
            'status'            => 'required|string',
        ]);

        $company = Company::find($this->company_id);
        $company->update($data);

        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'edit-company']);
        $this->dispatchBrowserEvent('success', ['success' => 'Empresa '. $company->corporate_name . ' atualizada com sucesso!']);
    }

    public function alert($id)
    {
        $this->authorize('empresa.excluir', Auth::user()->can('empresa.excluir'));

        $this->dispatchBrowserEvent('show', ['open' => 'alert-company']);
        $this->company_id = $id;
    }

    public function delete()
    {
        $company = Company::find($this->company_id);
        $company->delete();
        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'alert-company']);
        $this->dispatchBrowserEvent('success', ['success' => 'Empresa '. $company->corporate_name . ' excluida com sucesso!']);
    }

    public function uppercase()
    {
        $this->corporate_name = mb_strtoupper($this->corporate_name, 'UTF-8');
    }

    public function clear()
    {
        $this->busca = '';
    }

    public function default()
    {
        $this->cnpj             = '';
        $this->corporate_name   = '';
        $this->status           = '';
    }
}
