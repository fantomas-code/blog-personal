<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth-base')]
class AuthReg extends Component
{   
    public User $user;

    public string $password = '', $password_confirmation = '';

    public function rules(): array {
        return [
            'user.name'  => 'required|min:3',
            'user.email' => 'required|string|email|unique:users,email',
            'password'   => 'required|min:3|confirmed'
        ];
    }

    public function mount(User $user){
        $this->user = $user;
    }

    public function register()
    {
        $this->validate();
        $this->user->password = bcrypt($this->password);

        $this->user->save();
        return to_route('login')->with('msg', __('Successful registration'));
        // dd('Si, pasa !!!');
    }

    #[Title('Registro !!!')]
    public function render()
    {
        return view('livewire.auth.auth-reg');
    }
}
