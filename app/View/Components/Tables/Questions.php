<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Questions extends Component
{
    public $questions;
    public $sortBy;
    public $sortDirection;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($questions, $sortBy, $sortDirection)
    {
        $this->questions = $questions;
        $this->sortBy = $sortBy;
        $this->sortDirection = $sortDirection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.questions');
    }
}
