<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.auth-base')]
class AuthLog extends Component
{
    // public User $user;
    public string $password = '', $id_login;
    public bool $remember = false;

    public function mount(User $user){
        $this->user = $user;
    }

    public function login() {

        $this->validate([
            'id_login'  => 'required|string',
            'password'  => 'required'
        ]);

        $credentials = [
            filter_var($this->id_login, FILTER_VALIDATE_EMAIL) ? 'email' : 
            (is_numeric($this->id_login) ? 'phone' : 'alias') => $this->id_login,
            'password'  => $this->password
        ];
        // dd($credentials);
        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user, $remember = true);
            return to_route('panel')->with('msg', __('You are logged in'));
        } else {
            session()->flash('msg', __('Invalid credentials. Please try again.'));
        }
        

        // dd('Si, pasa !!!');
    }

    #[Title('Inicio de sesión')]
    public function render()
    {
        return view('livewire.auth.auth-log');
    }
}
