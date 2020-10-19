<?php

namespace App;

class Db
{
    private $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/config.php')['db'];
        $this->dbh = new \PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    public function query($sql,  $class, $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if ($res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

    public function execute($sql,  $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }
}


