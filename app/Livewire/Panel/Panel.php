<?php

namespace App\Livewire\Panel;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Panel extends Component
{
    public User $user;

    public $search = '';

    #[Title('Panel ...')]
    public function render()
    {
        return view('livewire.panel.panel', [
            'users' => User::all()
        ]);
    }
}
