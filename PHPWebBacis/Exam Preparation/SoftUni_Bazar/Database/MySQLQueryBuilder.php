<?php


namespace Database;

class MySQLQueryBuilder implements MySQLQueryBuilderInterface
{
    /**
     * @var string $query
     */
    public $query;

    /**
     * @var array where
     */
    public $where;

    /**
     * MySQLQueryBuilder constructor.
     */
    public function __construct()
    {
        $this->query = '';
    }

    public function select(array $columns = []): MySQLQueryBuilder
    {
        $query = 'SELECT ';
        if (empty($columns)) {
            $query .= '* ';
        } else {
            $query .= implode(', ', $columns);
        }

        $this->query = $query;
        return $this;
    }

    public function from(string $table): MySQLQueryBuilder
    {
        $this->query .= 'FROM `' . $table . '` ';
        return $this;
    }

    public function where(array $criteria = []): MySQLQueryBuilder
    {
        $query = 'WHERE 1=1 ';
        foreach (array_keys($criteria) as $column) {
            $query .= 'AND ' . $column . " = ? ";
        }

        $this->query .= $query;
        $this->where = array_values($criteria);
        return $this;
    }

    public function orderBy(array $params = []): MySQLQueryBuilder
    {
        if (empty($params))
            return $this;

        $query = "ORDER BY ";
        foreach ($params as $order) {
            $query .= $order . ", ";
        }
        $query = rtrim($query, ',');
        $this->query .= $query;
        return $this;
    }

    public function groupBy(array $columns = []): MySQLQueryBuilder
    {
        $query = "ORDER BY ";
        foreach ($columns as $column) {
            $query .= $column . " = ?, ";
        }
        $query = rtrim($query, ',');
        $this->query .= $query;
        return $this;
    }

    public function build(): Database
    {
        return new Database($this);
    }
}