<?php


namespace Database;


interface MySQLQueryBuilderInterface
{
    public function select(array $columns = []): MySQLQueryBuilder;
    public function from(string $table): MySQLQueryBuilder;
    public function where(array $criteria = []): MySQLQueryBuilder;
    public function orderBy(array $order = []): MySQLQueryBuilder;
    public function groupBy(array $column = []): MySQLQueryBuilder;
    public function build();

}