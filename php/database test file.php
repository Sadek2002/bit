<?php

require_once "Database.php";
$db = new Database();
$db->checkConnectionToDatabase();


/*echo "<pre>";
print_r($db->getTableByName("products"));
echo "</pre>";*/

foreach ($db->getTableByName("products") as $row) {
    foreach ($row as $item => $value) {
        if ($item === "$item") {
            echo $item.": ".$value;
            echo "<br>";
        }
    }
    echo "<br><br>";
}