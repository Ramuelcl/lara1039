<?php

namespace App\Livewire\Users;

use Livewire\{WithPagination, Component};
use App\Models\User;

class LwMuestraUsuarios extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        if ($this->search) {
            $users = User::paginate(5);
        } else {
            $users = User::where('name', 'like', "%$this->search%")->paginate(5);
        }
        return view('livewire.users.lw-muestra-usuarios', [
            'users' => $users,
        ]);
    }
}
