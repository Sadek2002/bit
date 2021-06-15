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
        $query = "SELECT * FROM $tableName";
        $tableArray = array();

        foreach ($this->dbh()->query($query) as $row) {
            $tableArray[] = $row;
        }
        return $tableArray;
    }

    public function getRecordsFromTable ($tableName, $columnName, $columnValue) {
        $query = "SELECT * FROM $tableName WHERE $columnName = '$columnValue'";
        $records = array();

        foreach ($this->dbh()->query($query) as $row) {
            $records[] = $row;
        }
        return $records;
    }



    //delete function
    public function deleteRecordsFromTable ($tableName, $columnName, $columnValue) {
        $query = "DELETE FROM $tableName WHERE $columnName = '$columnValue'";

        $this->dbh()->query($query);
    }



    //update function
    public function updateRecordsFromTable ($tableName, $columnName, $newColumnValue, $searchColumn, $searchColumnValue) {
        $query = "UPDATE $tableName SET $columnName = '$newColumnValue' WHERE $searchColumn = '$searchColumnValue'";

        $this->dbh()->query($query);
    }



    //insert functions
    //...
    //function for products
    public function insertRecordToProducts ($product_type, $name, $description, $img_url, $color, $price, $in_stock) {
        $qeury = "INSERT INTO products (product_type, name, description, img_url, color, price, in_stock)
                  VALUES ('$product_type', '$name', '$description', '$img_url', '$color', '$price', '$in_stock')";

        $this->dbh()->query($qeury);
    }


    //function for product_has_sizes
    public function insertRecordToProductHasSizes ($product_id, $size) {
        $qeury = "INSERT INTO products_has_sizes (product_id, size) VALUES ('$product_id', '$size')";

        $this->dbh()->query($qeury);
    }


    //function for messages
    public function insertRecordToMessages ($email, $telephone_nr, $order_nr, $name, $subject, $text) {
        $qeury = "INSERT INTO messages (email, telephone_nr, order_nr, name, subject, text)
                  VALUES ('$email', '$telephone_nr', '$order_nr', '$name', '$subject', '$text')";

        $this->dbh()->query($qeury);
    }
}