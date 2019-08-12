<?php

namespace App\Service\Encryption;


class ArgonEncryptionService implements EncryptionServiceInterface
{

    public function hash(string $password)
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }

    public function verify(string $password, string $hash)
    {
        return password_verify($password, $hash);
    }
}