<?php

namespace App\View\Components\Modals\Categories;

use App\Models\Category;
use Illuminate\View\Component;

class Delete extends Component
{

    public $categories;
    public $categoryChoosed;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->categories = Category::get();
        $this->categoryChoosed = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modals.categories.delete');
    }
}
