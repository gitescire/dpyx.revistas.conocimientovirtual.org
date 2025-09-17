<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{
    public $title;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.page-title');
    }
}
