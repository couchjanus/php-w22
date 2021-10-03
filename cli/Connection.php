<?php

class Connection
{
    const DB_CONFIG = ROOT.'/config/db.php';
    private $config = [];
    public $pdo;

    public function __construct()
    {
        $this->config = require_once self::DB_CONFIG;
        $dsn = $this->makeDsn($this->config['db']);

        try{
            $this->pdo = new PDO($dsn, $this->config['user'], $this->config['password'], $this->config['options']);
        }catch(PDOException $e){
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    private function makeDsn($config)
    {
        $dsn = $config['driver'].':';
        unset($config['driver']);
        foreach ($config as $key => $value){
            $dsn .= $key. '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }
}