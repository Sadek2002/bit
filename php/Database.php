<?php

class Database {
    private $host = "";
    private $dbname = "";
    private $port = "";
    private $user = "";
    private $pass = "";

    public function __construct ($host, $dbname, $port, $user, $pass) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $pass;
    }


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

    public function getRecordsFromTable ($tableName, $recordName, $recordValue) {
        $query = "SELECT * FROM ".$tableName." WHERE ".$recordName." = "."'$recordValue'";
        $records = array();

        foreach ($this->dbh()->query($query) as $row) {
            $records[] = $row;
        }
        return $records;
    }



    //delete function
    public function deleteRecordsFromTable ($tableName, $recordName, $recordValue) {
        $query = "DELETE FROM ".$tableName." WHERE ".$recordName." = "."'$recordValue'";

        $this->dbh()->query($query);
    }



    //insert and update functions for products
    public function insertRecordToProducts () {

    }
}