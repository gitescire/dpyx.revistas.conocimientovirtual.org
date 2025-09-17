<?php

namespace App\Http\Livewire\Questions;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class Create extends Component
{
    public $categories;
    public $subcategories;

    public function mount(){
        $this->categories = Category::get();
        $this->subcategories = Subcategory::get();
    }

    public function render()
    {
        return view('livewire.questions.create');
    }
}
