<?php

namespace Database;

interface ResultSetInterface
{
    public function fetch($className) : \Generator;
    public function fetchOne($className);
    public function fetchAssoc() : \Generator;
}