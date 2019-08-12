<?php


namespace Database;


use PDO;
use PDOStatement;

class Database implements DatabaseInterface
{
    /**
     * @var PDO
     */
    private $db;
    /**
     * @var MySQLQueryBuilder
     */
    private $builder;
    /**
     * @var PDOStatement
     */
    private $statement;

    /**
     * Database constructor.
     * @param MySQLQueryBuilder $builder
     */
    public function __construct(MySQLQueryBuilder $builder)
    {
        $config = parse_ini_file("Config/db.ini");
        $this->db = new PDO($config['dsn'], $config['user'], $config['pass']);;
        $this->builder = $builder;
    }

    public function query(): Database
    {
        $this->db->query($this->builder->query);
        return $this;
    }

    public function prepare(): Database
    {
        $this->statement = $this->db->prepare($this->builder->query);
        return $this;
    }
    public function execute(): Database
    {
        $this->statement->execute($this->builder->where);
        return $this;
    }

    /**
     * @return mixed
     */
    public function fetch(): array
    {
        $result = $this->statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    /**
     * @return mixed
     */
    public function fetchAll(): array
    {
        $result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}