<?php

namespace App\Http\Livewire\Evaluations;

use App\Models\Category;
use App\Models\Evaluation;
use Livewire\Component;

class Show extends Component
{
    public function mount(Evaluation $evaluation){
        return redirect()->route('evaluations.categories.questions.index',[$evaluation, Category::first()]);
    }

    public function render()
    {
        return view('livewire.evaluations.show');
    }
}
