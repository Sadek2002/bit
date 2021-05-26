<?php

class Database {
    private $host = "localhost";
    private $port = "3306";
    private $user = "root";
    private $pass = "";
    private $db = "bit_academy";


    function test () {
        if (1 + 2 === 3) {
            echo "het werkt waaaaat!";
        }
        else {
            echo "dat is jammer";
        }
    }
}