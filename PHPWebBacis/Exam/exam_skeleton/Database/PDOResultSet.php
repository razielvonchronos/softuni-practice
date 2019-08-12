<?php

namespace Database;


class PDOResultSet implements ResultSetInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }


    public function fetch($className) : \Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }

    public function fetchAssoc() : \Generator
    {
        while ($row = $this->pdoStatement->fetch(\PDO::FETCH_ASSOC)){
            yield $row;
        }
    }

    public function fetchOne($className)
    {
        return $this->pdoStatement->fetchObject($className);
    }
}
