<?php

namespace App\Http\Livewire\Report;

use Barryvdh\DomPDF\Facade as PDF;
use App\Models\User;
use App\Models\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    public $user, $to, $from;

    protected $rules = [
        'from'      => 'required|date',
        'to'        => 'required|date',
    ];

    protected $listeners = ['openReport'];

    public function mount()
    {
        $this->user = User::find(Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.report.index');
    }

    public function openReport()
    {
        $this->dispatchBrowserEvent('show', ['open' => 'report-partner']);
    }

    public function generate()
    {
        $results = Request::whereBetween('created_at', [$this->from, $this->to])
        ->where('user_id', Auth::user()->id)
        ->get();

        $pdf = PDF::loadView('pdf.request-report', compact('results'))
        ->setOptions(['defaultFont' => 'courier'])->output();
        
        $this->default();
        $this->dispatchBrowserEvent('hide', ['close' => 'report-partner']);
        
        return response()->streamDownload(
            fn () => print($pdf),
            "relatorio.pdf"
       );

    }

    public function default()
    {
        $this->from     = '';
        $this->to       = '';
    }
}
