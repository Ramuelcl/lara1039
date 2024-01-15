<?php
// app\Livewire\Createuser
// resources.views.livewire.users.createuser

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User as Datas;

class Createuser extends Component
{
    public $datas;

    public function render()
    {
        $this->datas = Datas::all();
        return view('livewire.users.createuser', ['datas' => $datas]);
    }
}
