<?php

namespace App\Http\Livewire\Announcements;

use App\Models\Announcement;
use Livewire\Component;

class Index extends Component
{
    private $announcements;

    public function render()
    {
        $this->announcements = Announcement::paginate(10);
        return view('livewire.announcements.index', [
            'announcements' => $this->announcements
        ]);
    }
}
