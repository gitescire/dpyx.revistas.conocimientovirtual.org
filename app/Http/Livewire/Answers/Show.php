<?php

namespace App\Http\Livewire\Answers;

use App\Models\Answer;
use Livewire\Component;

class Show extends Component
{

    public $answer;

    public function mount(Answer $answer){
        $this->answer = $answer;
    }

    public function render()
    {
        return view('livewire.answers.show');
    }
}
