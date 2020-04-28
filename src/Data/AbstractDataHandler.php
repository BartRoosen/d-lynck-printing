<?php

namespace Data;

use Config\Config;
use PDO;

class AbstractDataHandler
{
    /** @var PDO | null */
    private $dbh = null;

    protected function select($query, array $params = null)
    {
        $this->openDataBase();

        $stmt = $this->dbh->prepare($query);
        $stmt->execute($params);

        $this->closeDataBase();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function insert($query, array $params)
    {
        $lastInsertedId = null;
        $this->openDataBase();

        $stmt = $this->dbh->prepare($query);
        $stmt->execute($params);
        $lastInsertedId = $this->dbh->lastInsertId();

        $this->closeDataBase();

        return $lastInsertedId;
    }

    protected function delete($query, array $params)
    {
        $this->openDataBase();

        $stmt = $this->dbh->prepare($query);
        $stmt->execute($params);

        $this->closeDataBase();
    }

    private function openDataBase()
    {
        $this->dbh = new PDO(Config::DB_CONNECTIONSTRING, Config::DB_USER, Config::DB_PASSWORD);
    }

    private function closeDataBase()
    {
        $this->dbh = null;
    }
}
