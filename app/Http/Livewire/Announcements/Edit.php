<?php

namespace App\Http\Livewire\Announcements;

use App\Models\Announcement;
use Livewire\Component;

class Edit extends Component
{
    public $announcement;

    public function mount(Announcement $announcement)
    {
        $this->announcement;
    }

    public function render()
    {
        return view('livewire.announcements.edit');
    }
}
