<?php

namespace App\Http\Livewire\Manage;

use App\Models\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;
    
    public $to, $from, $rstatus, $rsituation;

    public $busca, $amount, $user_id;

    public $id_request, $company_id, $partner_id, $protocol, $status, $situation, $service, $cpf, $employee_name, $gender, $born_date, $department, $post;

    protected $rules = [
        'user_id'       => '', 
        'company_id'    => '', 
        'partner_id'    => '', 
        'status'        => '', 
        'situation'     => '', 
        'service'       => '', 
        'cpf'           => '', 
        'employee_name' => '', 
        'gender'        => '', 
        'born_date'     => '', 
        'department'    => '', 
        'post'          => '',
    ];

    public function mount()
    {
        $this->from = date('Y-m-d', strtotime("-9 days"));
        $this->to = date('Y-m-d', strtotime("+1 days"));
        $this->rstatus = 'Valida';
        $this->rsituation = 'Solicitado';
    }

    public function render()
    {
        $this->authorize('gerenciamento.ver', Auth::user()->can('gerenciamento.ver'));
        
        return view('livewire.manage.index', [
            'requests' => Request::where('employee_name', 'LIKE', "%{$this->busca}%")
            ->whereBetween('created_at', [$this->from, $this->to])
            ->where('situation', $this->rsituation)
            ->where('status', $this->rstatus)
            ->orderBy('id', 'DESC')
            ->paginate(20)
        ]);
    }

    public function situation($id)
    {
        $this->authorize('gerenciamento.editar', Auth::user()->can('gerenciamento.editar'));

        $request = Request::find($id);

        $this->id_request = $request->id;
        $this->situation = $request->situation;

        $this->dispatchBrowserEvent('show', ['open' => 'update-manage']);
    }

    public function update()
    {
        $request = Request::find($this->id_request);
        $request->update([
            'situation' => $this->situation
        ]);

        $this->dispatchBrowserEvent('hide', ['close' => 'update-manage']);
        $this->dispatchBrowserEvent('success', ['success' => 'Status atualizado com sucesso!']);
    }

    public function alert($id)
    {
        $this->authorize('gerenciamento.excluir', Auth::user()->can('gerenciamento.excluir'));

        $this->dispatchBrowserEvent('show', ['open' => 'alert-manage']);
        $this->id_request = $id;
    }

    public function status()
    {
        $request = Request::find($this->id_request);
        $request->update([
            'status' => 'Invalida'
        ]);
        $this->dispatchBrowserEvent('hide', ['close' => 'alert-manage']);
        $this->dispatchBrowserEvent('success', ['success' => 'Status alterado com sucesso!']);
    }

}
