<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Announcements extends Component
{
    public $announcement;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($announcement = null)
    {
        $this->announcement = $announcement;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.announcements');
    }
}
