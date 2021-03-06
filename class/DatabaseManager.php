<?php
class DatabaseManager
{

    private const DB_NAME = "su1dcdd2b8ho945t";
    private const HOST = "u615qyjzybll9lrm.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306";
    private const USER = "mifedtez0sou0ucl";
    private const PWD = "qyvvu9tg7iz8v4j2";

    private static $instance = null;
    private $database;

    public static function getInstance(): DatabaseManager
    {
        if (self::$instance == null) {
            self::$instance = new static;
        }
        return self::$instance;
    }

    protected function __construct()
    {
        try {
            $db = new PDO("mysql:dbname=" . $this::DB_NAME . ";host=" . $this::HOST, $this::USER, $this::PWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            echo 'Connection to database failed : ' . $th->getMessage();
        }
        $this->database = $db;
    }

    public function getDatabase()
    {
        return $this->database;
    }
}
