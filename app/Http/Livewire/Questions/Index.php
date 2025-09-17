<?php

namespace App\Http\Livewire\Questions;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    private $questions;
    public $categories;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public function render()
    {
        $this->categories = Category::get();

        $this->categories->each(function ($category) {
            $category->subcategories = Subcategory::get();
            $category->subcategories->each(function ($subcategory) use ($category) {
                $subcategory->total_punctuation = Question::where('category_id', $category->id)->where('subcategory_id', $subcategory->id)->get()->pluck('max_punctuation')->flatten()->sum();
                $subcategory->total_questions = Question::where('category_id', $category->id)->where('subcategory_id', $subcategory->id)->get()->count();
            });
        });
        $this->setQuestions();
        return view('livewire.questions.index', [
            'questions' => $this->questions,
        ]);
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }

    private function setQuestions()
    {
        $this->questions = Question::with('category')->with('subcategory');

        if ($this->search) {
            $this->questions = $this->questions->where('description', 'like', '%' . $this->search . '%')
                ->orWhereHas('category', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('subcategory', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
        }


        if ($this->sortDirection == 'desc') {
            $this->questions = $this->questions->get()->sortByDesc($this->sortBy)->paginate(10);
        } else {
            $this->questions = $this->questions->get()->sortBy($this->sortBy)->paginate(10);
        }
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        $this->sortBy = $field;
    }
}
