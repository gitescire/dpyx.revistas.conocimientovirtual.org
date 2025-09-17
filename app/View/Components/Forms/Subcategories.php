<?php

namespace App\View\Components\Forms;

use App\Models\Subcategory;
use Illuminate\View\Component;

class Subcategories extends Component
{
    public $subcategory;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subcategory = null)
    {
        $this->subcategory = $subcategory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.subcategories');
    }
}
