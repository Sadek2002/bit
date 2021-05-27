<?php

class Database {
    private $host = "localhost";
    private $dbname = "bit_academy";
    private $port = "3306";
    private $user = "root";
    private $pass = "";


    //functions for connecting to database
    private function dbh () {
        $dbh = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';port='.$this->port, $this->user, $this->pass);
        return $dbh;
    }

    public function checkConnectionToDatabase () {
        try {
            $this->dbh();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }


    //get functions
    public function getTableByName ($tableName) {
        $query = "SELECT * FROM ".$tableName;
        $tableArray = array();

        foreach ($this->dbh()->query($query) as $row) {
            $tableArray[] = $row;
        }
        return $tableArray;
    }

    public function getRecordFromTableById ($tableName, $idName, $idValue) {
        $query = "SELECT * FROM ".$tableName." WHERE ".$idName." = "."'$idValue'";
        $record = array();

        foreach ($this->dbh()->query($query) as $row) {
            $record = $row;
        }
        return $record;
    }
}