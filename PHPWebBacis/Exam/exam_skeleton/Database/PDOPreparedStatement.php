<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10/26/2018
 * Time: 10:46
 */

namespace Database;


class PDOPreparedStatement implements StatementInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }

    public function execute(array $params = []): ResultSetInterface
    {
        $this->pdoStatement->execute($params);
        return new PDOResultSet($this->pdoStatement);
    }


}