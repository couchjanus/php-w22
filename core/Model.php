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

    public function get($pk){
        $stmt = $this->conn->prepare("SELECT * FROM ".static::$table." WHERE id = ".$pk);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public function update($pk, $params){
        $keys = [];
        foreach($params as $key => $value){
            array_push($keys, $key."='".$value."'");
        }
        $sql = sprintf('UPDATE %s SET %s WHERE %s = %s', static::$table, implode(',', $keys), 'id', $pk);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function destroy($pk){
        $stmt = $this->conn->prepare("DELETE FROM ".static::$table. " WHERE id = ? LIMIT 1");
        $stmt->execute([$pk]);
    }

    public function run($sql)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBy($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}