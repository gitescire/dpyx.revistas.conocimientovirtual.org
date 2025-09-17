<?php

namespace App\Http\Livewire\Users;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    private $users;
    public $search = "";

    public function render()
    {
        $this->setUsers();
        return view('livewire.users.index', [
            'users' => $this->users
        ]);
    }

    private function setUsers()
    {

        $this->users = User::orderBy('id', 'desc');

        if ($this->search) {
            $this->users = $this->users
            ->where(function($query){
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%')
                        ->orWhereHas('roles', function ($query) {
                            return $query->where('name', 'like', '%'.$this->search.'%');
                        });
            });
        }

        if (Auth::user()->is_admin) {
            $this->users = $this->users;
        } else {
            $repositoryResponsiblesIds = Evaluation::where('evaluator_id', Auth::user()->id)->get()->pluck('repository.responsible.id')->flatten()->unique();
            $this->users = $this->users->whereIn('id', $repositoryResponsiblesIds);
        }

        $this->users = $this->users->paginate(10);
        
    }

    public function updatingSearch()
    {
        $this->gotoPage(1);
    }
}
