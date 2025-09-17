<?php

namespace App\View\Components\Forms;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\Component;

class Users extends Component
{
    public $user;
    public $evaluators;
    public $roles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user = null)
    {
        $this->roles = Role::get();
        $this->user = $user;
        $this->evaluators = User::evaluators()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.users');
    }
}
