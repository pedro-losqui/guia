<?php

namespace App\Http\Livewire\Exam;

use App\Models\Exam;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests;
    
    public $busca;
    
    public $exam_id, $name;

    protected $rules = [
        'name' => 'required|string', 
    ];

    public function render()
    {
        $this->authorize('exame.ver', Auth::user()->can('exame.ver'));

        return view('livewire.exam.index', [
            'exams' => Exam::where('name', 'LIKE', "%{$this->busca}%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorize('exame.criar', Auth::user()->can('exame.criar'));

        $this->mount();
        $this->dispatchBrowserEvent('show', ['open' => 'create-exam']);
    }

    public function store()
    {
        $this->uppercase();
        
        Exam::create($this->validate());

        $this->dispatchBrowserEvent('hide', ['close' => 'create-exam']);
        $this->dispatchBrowserEvent('success', ['success' => 'Exame cadastrado com sucesso!']);
        $this->mount();
    }

    public function uppercase()
    {
        $this->name = ucwords(mb_strtolower($this->name, 'UTF-8'));
    }

    public function default()
    {
        $this->exam_id  = '';
        $this->name     = '';
    }

}
