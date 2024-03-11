<?php
namespace core;

use PDO;
use core\App;


class Database
{
    public $connection;
    public $statement;
    public function __construct($config, $username = 'root', $password = 'Joel1995.com')
    {
        $dsn = "mysql:" . (http_build_query($config, '', ';'));//this $dsn variable hold the full string : mysql:host=localhost;port=3306;dbname=myapp
        $this->connection = new PDO($dsn, $username, $password, [//
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
 
    }

    public function Query($query, $param = [])
    {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($param);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findorFail()
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }
    public function get()
    {
        return $this->statement->fetchAll();
    }

}

