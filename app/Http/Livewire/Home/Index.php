<?php

namespace App\Http\Livewire\Home;

use App\Models\User;
use App\Models\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user, $amount;
    
    public function mount()
    {
        $this->request();
        $this->user();
    }

    public function render()
    {
        return view('livewire.home.index');
    }

    public function request()
    {
        $this->amount = Request::where('user_id', Auth::user()->id)->get();
    }

    public function user()
    {
        $this->user = User::find(Auth::user()->id);
    }
}
