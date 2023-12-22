<?php

namespace App\Livewire\Panel;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MenuUser extends Component
{
    public function logout(): mixed
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return to_route('login')->with('msg', __('You have logged out'));
    }

    public function render()
    {
        return view('livewire.panel.menu-user');
    }
}
