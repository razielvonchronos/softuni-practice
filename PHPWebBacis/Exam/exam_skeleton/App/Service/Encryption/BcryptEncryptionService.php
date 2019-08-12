<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.6.2019 г.
 * Time: 15:07
 */

namespace App\Service\Encryption;


class BcryptEncryptionService
{
    public function hash(string $password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function verify(string $password, string $hash)
    {
        return password_verify($password, $hash);
    }
}