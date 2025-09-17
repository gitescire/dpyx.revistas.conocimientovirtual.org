<?php

namespace App\Http\Livewire\Subcategories;

use App\Models\Subcategory;
use Livewire\Component;

class Edit extends Component
{
    public $subcategory;

    public function mount(Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;
    }

    public function render()
    {
        return view('livewire.subcategories.edit');
    }
}
