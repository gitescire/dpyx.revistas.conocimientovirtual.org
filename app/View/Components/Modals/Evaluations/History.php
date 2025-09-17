<?php

namespace App\View\Components\Modals\Evaluations;

use App\Models\Evaluation;
use Illuminate\View\Component;

class History extends Component
{
    public $evaluation;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Evaluation $evaluation)
    {
        $this->evaluation = $evaluation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modals.evaluations.history');
    }
}
