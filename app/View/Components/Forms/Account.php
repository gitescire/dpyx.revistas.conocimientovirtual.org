<?php

namespace App\View\Components\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Account extends Component
{
    public $edit;
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($edit = false)
    {
        $this->edit = $edit;
        $this->user = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.account');
    }
}
