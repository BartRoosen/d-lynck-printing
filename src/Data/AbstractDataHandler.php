<?php

namespace Data;

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
        $this->dbh = new PDO(DBConfig::$DB_CONNECTIONSTRING, DBConfig::$DB_USER, DBConfig::$DB_PASSWORD);
    }

    private function closeDataBase()
    {
        $this->dbh = null;
    }
}
