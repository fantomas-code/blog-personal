<?php

namespace App\Livewire\Panel;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ProfileUser extends Component
{
    public User $user;

    public string $current_password = '', $password = '', $password_confirmation = '';

    protected function rules(): array {
        return [
            // 'image' => 'nullable|mimes:jpg,jpeg,bmp,png',
            'user.name'  => 'required|min:3',
            'user.email' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->user),
            ],

            'user.alias' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->user),
            ],
            'user.alias' => 'nullable|min:4|alpha_dash:ascii|unique:users,alias',
            'user.phone' => 'nullable|min:10|numeric'
        ];
    }

    public function mount(User $user): void
    {
        $this->user = auth()->user();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }
    
    public function updateprofile(): mixed
    {
        $user = auth()->user();
        $this->validate();

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $this->user->save();
        return to_route('panel')->with('msg', __('Updated profile'));
    }

    public function updatepassword(): void {
        try {
            $validatepass = $this->validate([
                'current_password' => 'required|string|current_password',
                'password' => ['required', 'string', Password::min(3), 'confirmed']
            ]);
        } catch (ValidationException $e) {
            $this->fill([
                'current_password' => '',
                'password' => '',
                'password_confirmation' => '',
            ]);
            throw $e;
        }

        auth()->user()->update([
            'password' => bcrypt($validatepass['password']),
        ]);

        $this->fill([
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ]);
        // $this->fill('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }

    public function deleteprofile(): mixed
    {
        // dd('Si, pasa !!!');
        // $this->validate([
        //     'password' => 'required|string|current_password'
        // ]);

        tap(auth()->user(), fn () => auth()->logout())->delete();

        session()->invalidate();
        session()->regenerateToken();
        return to_route('login')->with('msg', __('Account deleted'));
    }

    #[Title('Perfil usuario !!!')]
    public function render()
    {
        return view('livewire.panel.profile-user');
    }
}
