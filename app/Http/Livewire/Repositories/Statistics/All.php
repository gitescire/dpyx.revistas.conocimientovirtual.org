<?php

namespace App\Http\Livewire\Repositories\Statistics;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Repository;
use App\Models\Subcategory;
use Livewire\Component;

class All extends Component
{
    public $repositories;
    public $subcategories;
    public $categories;

    public function mount()
    {
        $this->categories = Category::has('questions')->with('questions')->get();
        $this->repositories = Repository::get();
        $this->subcategories = Subcategory::get();

        foreach ($this->repositories as  $repository) {
            $repository->append('qualification');
        }

        foreach ($this->categories as $category) {
            foreach ($category->questions as $question) {
                $question->answers = Answer::where('question_id', $question->id)->with('choice')->get();
                $question->append('max_punctuation');
            }
        }
    }

    public function render()
    {
        return view('livewire.repositories.statistics.all');
    }
}
