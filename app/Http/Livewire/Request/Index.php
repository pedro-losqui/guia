<?php

namespace App\Http\Livewire\Request;

use App\Models\Exam;
use App\Models\User;
use App\Models\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;

    public $to, $from;

    public $companies, $partners, $exams;

    public $busca, $amount, $user_id;

    public $request_id, $exam_id, $company_id, $partner_id, $protocol, $status, $situation, $service, $cpf, $employee_name, $gender, $born_date, $department, $post;

    protected $rules = [
        'user_id'       => 'required', 
        'company_id'    => 'required', 
        'partner_id'    => 'required', 
        'protocol'      => 'required', 
        'status'        => 'required|string', 
        'situation'     => 'required|string', 
        'service'       => 'required|string', 
        'cpf'           => 'required|string|cpf', 
        'employee_name' => 'required|string', 
        'gender'        => 'required|string', 
        'born_date'     => 'required|', 
        'department'    => 'required|string', 
        'post'          => 'required|string',
    ];

    public function mount()
    {
        $this->from = date('Y-m-d', strtotime("-9 days"));
        $this->to = date('Y-m-d', strtotime("+1 days"));
        $this->company();
        $this->partner();
        $this->exam();
    }

    public function render()
    {
        $this->authorize('solicitação.ver', Auth::user()->can('solicitação.ver'));

        return view('livewire.request.index', [
            'requests' => Request::where('employee_name', 'LIKE', "%{$this->busca}%")
            ->whereBetween('created_at', [$this->from, $this->to])
            ->where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(20)
        ]);
    }

    public function report()
    {
        $this->emit('openReport');
    }

    public function create()
    {
        $this->authorize('solicitação.criar', Auth::user()->can('solicitação.criar'));

        $this->default();
        $this->dispatchBrowserEvent('show', ['open' => 'create-request']);
    }

    public function store()
    {
        $this->uppercase();
        $this->generate();

        $this->request_id = Request::create($this->validate());

        if ($this->exam_id) {
            $this->examSync();
        }

        $this->mount();
        $this->dispatchBrowserEvent('hide', ['close' => 'create-request']);
        $this->dispatchBrowserEvent('success', ['success' => 'Silicitação gerada com sucesso!']);
    }

    public function generate()
    {
        $this->user_id = Auth::user()->id;
        $this->protocol = $this->company_id. '-' . $this->partner_id. '-' . date('Ymdhms-') . rand(1, 20);
        $this->status = "Valida";
        $this->situation = "Solicitado";
    }

    public function uppercase()
    {
        $this->employee_name = ucwords(mb_strtolower($this->employee_name, 'UTF-8'));
        $this->department = ucwords(mb_strtolower($this->department, 'UTF-8'));
        $this->post = ucwords(mb_strtolower($this->post, 'UTF-8'));
    }

    public function company()
    {
        $this->companies = User::find(Auth::user()->id);
    }

    public function partner()
    {
        $this->partners = User::find(Auth::user()->id);
    }

    public function exam()
    {
        $this->exams = Exam::all();
    }

    public function examSync()
    {   
        $this->request_id->exams()->sync($this->exam_id);
    }

    public function default()
    {
        $this->user_id          = '';
        $this->exam_id          = '';
        $this->company_id       = '';
        $this->partner_id       = '';
        $this->protocol         = '';
        $this->status           = '';
        $this->situation        = '';
        $this->employee_name    = '';
        $this->cpf              = '';
        $this->gender           = '';
        $this->born_date        = '';
        $this->department       = '';
        $this->post             = '';
    }
}
