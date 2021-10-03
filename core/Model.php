<?php
require_once 'Connection.php';

class Model
{
    protected static $table = '';

    protected $conn;

    public function __construct()
    {
        $this->conn = Connection::connect();
    }

    public function all()
    {
        $stmt = $this->conn->prepare('SELECT * FROM '.static::$table);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function save($params)
    {
        $sql = sprintf('INSERT INTO %s(%s) VALUES(%s)', static::$table, implode(', ', array_keys($params)), ':'.implode(', :', array_keys($params)));

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
    }
}