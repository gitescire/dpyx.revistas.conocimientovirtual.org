<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.categories.edit');
    }
}
