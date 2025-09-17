<?php

namespace App\View\Components\Modals\Users;

use App\Models\Evaluation;
use App\Models\Repository;
use App\Models\User;
use Illuminate\View\Component;

class Delete extends Component
{
    public $user;
    public $repositories;
    public $evaluations;
    public $evaluators;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->evaluators = User::evaluators()->get();
        $this->repositories = Repository::where('responsible_id',$user->id)->get();
        $this->evaluations = Evaluation::where('evaluator_id',$user->id)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modals.users.delete');
    }
}
