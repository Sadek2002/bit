<?php

//this way you need to activate de Database.php file
require_once "Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();


//delete function
//$db->deleteRecordsFromTable("products", "Description", "test");


//insert function
//$db->insertRecordToProducts("cap", "pet geel", "mooie pet", "img/petten/pet12", 15.00);
//$db->insertRecordToMessages("3", "Dit werkt echt goed!");


echo "<pre>";
print_r($db->getRecordsFromTable("messages", "message_id", "1"));
echo "</pre>";


//this way you can use getTableByName
foreach ($db->getTableByName("messages") as $row) {
    foreach ($row as $item => $value) {
        if ($item === "$item") {
            echo $item.": ".$value;
            echo "<br>";
        }
    }
    echo "<br><br>";
}