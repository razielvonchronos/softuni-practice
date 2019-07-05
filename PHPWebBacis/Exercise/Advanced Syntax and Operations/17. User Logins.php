<?php
$attempts = 0;
$users = [];

/**
 * @param array $users
 * @param string $username
 * @param string $password
 */
function SignUp(array &$users, string $username, string $password): void
{
    $users[$username] = $password;
}

/**
 * @param array $users
 * @param string $username
 * @param string $password
 * @return bool
 */
function SighIn(array &$users, string $username, string $password): bool
{
    $logged = array_key_exists($username, $users) && $users[$username] == $password;
    return $logged;
}

while (true) {

    $args = explode(' -> ', readline());

    if ($args[0] == "login") {
        break;
    }

    $username = $args[0]; // team expected
    $password = $args[1];

    SignUp($users, $username, $password);
}

while (true) {

    $args = explode(' -> ', readline());

    if ($args[0] == "end") {
        break;
    }

    $username = $args[0]; // team expected
    $password = $args[1];

    $success = SighIn($users, $username, $password);

    printf("%s: %s" . PHP_EOL, $username, $success ? "logged in successfully" : "login failed");
    if (!$success)
        $attempts++;
}

if ($attempts > 0)
    printf('unsuccessful login attempts: %d' . PHP_EOL, $attempts);
