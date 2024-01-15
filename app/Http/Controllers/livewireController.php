<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class livewireController extends Controller
{
    public function lwentidades()
    {
        return view('livewire.lwentidades');
    }
}
