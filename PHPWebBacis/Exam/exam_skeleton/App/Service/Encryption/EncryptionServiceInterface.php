<?php

namespace App\Service\Encryption;


interface EncryptionServiceInterface
{
    public function hash(string $password) ;
    public function verify(string $password, string $hash);
}