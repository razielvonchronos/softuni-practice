<?php

session_start();
spl_autoload_register();

$template = new \Core\Template();
$dataBinder = new \Core\DataBinder();
$dbInfo = parse_ini_file("Config/db.ini");
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);

$userRepository = new \App\Repository\UserRepository($db, $dataBinder);
$encryptionService = new \App\Service\Encryption\ArgonEncryptionService();
$userService = new \App\Service\UserService($userRepository, $encryptionService);
$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder, $userService);



$roomRepository = new \App\Repository\RoomRepository($db);
$roomService = new \App\Service\RoomService($roomRepository);

$townRepository = new \App\Repository\TownRepository($db);
$townService = new \App\Service\TownService($townRepository);

$offerRepository = new \App\Repository\OfferRepository($db);
$offerService = new \App\Service\OfferService($offerRepository);



$offerHttpHandler = new \App\Http\OfferHttpHandler($template, $dataBinder, $roomService ,$townService, $offerService, );