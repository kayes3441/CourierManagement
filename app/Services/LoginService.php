<?php

namespace App\Services;

class LoginService
{
    public function isLoginSuccessful(string $email, string $password): bool
    {
        if (auth('admins')->attempt(['email' => $email, 'password' => $password])) {
            return true;
        }
        return false;
    }

    public function logout(): void
    {
        auth('admins')->logout();
        session()->invalidate();
    }

}
