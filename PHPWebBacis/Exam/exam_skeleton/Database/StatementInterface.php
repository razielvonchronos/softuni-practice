<?php

namespace Database;

interface StatementInterface
{
    public function execute(array $params = []) : ResultSetInterface;
}