<?php

namespace App\Http\Livewire\Announcements\Evaluations;

use App\Models\Announcement;
use Livewire\Component;

class Index extends Component
{
    public $announcement;

    public function mount(Announcement $announcement)
    {
        $this->announcement = $announcement;
    }

    public function render()
    {
        return view('livewire.announcements.evaluations.index');
    }
}
