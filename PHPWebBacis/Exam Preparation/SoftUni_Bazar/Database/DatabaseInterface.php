<?php


namespace Database;

use PDOStatement;

interface DatabaseInterface
{

    public function query(): Database;

    public function execute(): Database;

    public function fetch(): array;

    public function fetchAll(): array;

}