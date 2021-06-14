<?php

//this way you need to activate de Database.php file
require_once "Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();


//delete function
//$db->deleteRecordsFromTable("products", "description", "test");


//insert function
//$db->insertRecordToProducts("Mask", "test mask", "test", "img/test", "Red", 2.99, 25);
//$db->insertRecordToMessages("test@2.nl", "", "", "jan de boer 2", "test2", "test test test2");


//update function
//$db->updateRecordsFromTable("products", "price", "25.50", "product_id", "1");


echo "<pre>";
print_r($db->getRecordsFromTable("messages", "message_id", "2"));
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