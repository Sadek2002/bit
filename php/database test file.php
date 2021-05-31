<?php

//this way you need to activate de Database.php file
require_once "Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();


//delete function
//$db->deleteRecordsFromTable("products", "Description", "test");


echo "<pre>";
print_r($db->getRecordsFromTableByName("products", "price", "1.25"));
echo "</pre>";


//this way you can use getTableByName
foreach ($db->getTableByName("products") as $row) {
    foreach ($row as $item => $value) {
        if ($item === "$item") {
            echo $item.": ".$value;
            echo "<br>";
        }
    }
    echo "<br><br>";
}