<?php

namespace App\Http\Livewire\Repositories;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\Repository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $firstCategory;
    private $repositories;

    public function mount()
    {
        $this->firstCategory = Category::first();
    }

    public function render()
    {
        $this->handleRepositories();
        return view('livewire.repositories.index', [
            'repositories' => $this->repositories
        ]);
    }

    protected function handleRepositories()
    {
        if (Auth::user()->is_admin) {

            $this->repositories = Repository::paginate(10);
        } else if (Auth::user()->is_evaluator) {

            $this->repositories = Repository::whereHas('evaluations', function ($query) {

                $query->whereEvaluator(Auth::user()->id);

                if ($announcement = Announcement::latest()->first()) {
                    $query->whereAnnouncement($announcement);
                }

                return $query;
            })->paginate(10);
        } else {
            $this->repositories = Auth::user()->repositories()->paginate(10);
        }
    }
}
