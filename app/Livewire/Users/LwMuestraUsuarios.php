<?php

namespace App\Livewire\Users;

use Livewire\{WithPagination, Component};
use App\Models\User;

class LwMuestraUsuarios extends Component
{
    use WithPagination; // protected $paginationTheme = 'bootstrap';

    public $collectionView = 5;
    public $collectionViews = ['5', '15', '25', '50'];

    public $search = '';
    public function render()
    {
        if ($this->search) {
            $users = User::paginate($this->collectionView);
        } else {
            $users = User::where('name', 'like', "%$this->search%")->paginate($this->collectionView);
        }
        return view('livewire.users.lw-muestra-usuarios', [
            'users' => $users,
        ]);
    }
}
