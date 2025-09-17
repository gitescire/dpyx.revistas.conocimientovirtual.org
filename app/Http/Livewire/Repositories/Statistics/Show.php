<?php

namespace App\Http\Livewire\Repositories\Statistics;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Repository;
use App\Models\Subcategory;
use Livewire\Component;

class Show extends Component
{
    public $repository;
    public $answers;
    public $categories;
    public $subcategories;

    public function mount(Repository $repository)
    {
        $this->repository = $repository->append('qualification');
        $this->answers = $repository->evaluations()->latest()->first()->answers;
        $this->categories = Category::has('questions')->with('questions')->get();
        $this->subcategories = Subcategory::get();


        foreach ($this->categories as $category) {
            foreach ($category->questions as $question) {
                $question->answer = Answer::where('question_id', $question->id)->where('evaluation_id', $repository->evaluations()->latest()->first()->id)->with('choice')->first();
                $question->append('max_punctuation');
            }
        }
    }

    public function render()
    {
        return view('livewire.repositories.statistics.show');
    }
}
