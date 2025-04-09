<?php

namespace App\Filament\App\Pages\Auth;

use Filament\Pages\Auth\Login;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginCustom extends Login
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Email')
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Password')
            ->password()
            ->required()
            ->extraInputAttributes(['tabindex' => 2]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }

    public function authenticate(): ?\Filament\Http\Responses\Auth\Contracts\LoginResponse
    {
        $credentials = $this->getCredentialsFromFormData($this->form->getState());
    
        if (!Auth::guard('instruktur')->attempt($credentials, $this->form->getState()['remember'] ?? false)) {
            $this->throwFailureValidationException();
        }
    
        $user = Auth::guard('instruktur')->user();
    
        if (!$user) {
            $this->throwFailureValidationException();
        }
    
        session()->regenerate();
    
        // Redirect to the intended URL or a default dashboard
        return redirect()->intended('/simcourt/instruktur/dashboard');
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.email' => 'Invalid credentials.',
        ]);
    }
}