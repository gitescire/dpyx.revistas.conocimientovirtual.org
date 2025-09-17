<?php

namespace App\View\Components\Modals\Answers;

use App\Models\Answer;
use App\Models\EvaluationHistory;
use Illuminate\View\Component;

class History extends Component
{

    public $answer;
    public $repository;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
        $this->repository = $this->answer->evaluation->repositories()->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modals.answers.history');
    }
}
