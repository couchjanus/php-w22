<?php
class Connection
{
    const DB_CONFIG = ROOT.'/config/db.php';
    private static $config = [];
    protected static $instance;

    protected function __construct()
    {
    }

    public static function connect()
    {
        self::$config = require_once self::DB_CONFIG;
        if(!self::$instance){
            $dsn = self::makeDsn(self::$config['db']);
            self::$instance = new PDO($dsn, self::$config['user'], self::$config['password'], self::$config['options']);

        }
        return self::$instance;   
    }

    private static function makeDsn($config)
    {
        $dsn = $config['driver'].':';
        unset($config['driver']);
        foreach ($config as $key => $value){
            $dsn .= $key. '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }
}