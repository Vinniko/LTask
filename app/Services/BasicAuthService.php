<?php


namespace App\Services;


class BasicAuthService
{
    private string $login;
    private string $password;

    public function __construct()
    {
        $this->login = config('api.login');
        $this->password = config('api.password');
    }

    public function auth(?string $login, ?string $password): bool
    {
        if ($login === $this->login && $password === $this->password) {
            return true;
        }

        return false;
    }
}
