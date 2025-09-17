<?php

namespace App\Http\Livewire\Users\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.users.account.edit');
    }
}
