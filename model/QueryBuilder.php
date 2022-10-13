<?php

class QueryBuilder
{
    private $whereQuery;
    private $selectQuery;
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->table = sprintf('%s%s', _DB_PREFIX_, $this->table);
    }

    public function where($columnName, $value, $operator = '=')
    {
        $this->whereQuery[] = sprintf(" `%s` %s '%s'", $columnName, $operator, $value);

        return $this;
    }

    public function select(array $select = ['*'])
    {
        $this->selectQuery = sprintf('SELECT %s ', implode(', ', $select));

        return $this;
    }

    /**
     * @param array $selectQuery
     * @return string
     */
    public function getSelectQuery(array $selectQuery = ['*']): string
    {
        if (empty($this->selectQuery)) {
            $this->select($selectQuery);
        }
        $query = sprintf('%s FROM %s', $this->selectQuery, $this->table);

        if (! empty($this->whereQuery)) {
            $query = sprintf('%s WHERE %s', $query, implode(' AND ', $this->whereQuery));
        }

        return $query;
    }

    /**
     * @param array $fields
     * @return string
     */
    public function getInsertQuery(array $fields): string
    {
        $values = [];
        $columns = [];
        foreach ($fields as $field => $value) {
            $columns[] = sprintf("`%s`", $field);
            $values[] = sprintf("'%s'", $value);
        }

        return sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $this->table,
            implode(', ', $columns),
            implode(', ', $values)
        );
    }

    public function getUpdateQuery(array $fields): string
    {
        $values = [];
        foreach ($fields as $field => $value) {
            $values[] = sprintf("`%s` = '%s'", $field, $value);
        }
        $query = sprintf("UPDATE %s SET %s",
            $this->table,
            implode(', ', $values)
        );

        if (! empty($this->whereQuery)) {
            $query = sprintf('%s WHERE %s', $query, implode(' AND ', $this->whereQuery));
        }

        return $query;
    }
}