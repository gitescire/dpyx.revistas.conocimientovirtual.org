<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $user;
    public $roles;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->roles = Role::get();
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
