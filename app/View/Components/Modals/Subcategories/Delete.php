<?php

namespace App\View\Components\Modals\Subcategories;

use App\Models\Subcategory;
use Illuminate\View\Component;

class Delete extends Component
{
    public $subcategories;
    public $subcategoryChoosed;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Subcategory $subcategory)
    {
        $this->subcategories = Subcategory::get();
        $this->subcategoryChoosed = $subcategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modals.subcategories.delete');
    }
}
