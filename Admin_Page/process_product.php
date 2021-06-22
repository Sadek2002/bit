<?php

require_once "../php/Database.php";
$db = new Database("localhost", "bit_academy", "3306", "root", "");
$db->checkConnectionToDatabase();


if (isset($_POST['create'])) {
    $fileType = $_FILES['file']['type'];

    if ($fileType != "image/jpg" && $fileType != "image/jpeg" && $fileType != "image/png") {
        echo "<p id='file-error'>File type is wrong!</p>";
        exit();
    }

    $fileName = $_FILES['file']['name'];
    $fileLocation = $_FILES['file']['tmp_name'];
    $fileTargetLocation = "../img/".time().$fileName;

    move_uploaded_file($fileLocation, $fileTargetLocation);


    $db->insertRecordToTable("");

    header("Location: adminpage.php");
}




if (isset($_POST['update'])) {
    $id = $_GET["id"];
    $product = $db->getRecordsFromTable("products", 'product_id', $id);

    $fileType = $_FILES['file']['type'];

    if ($fileType != "image/jpg" && $fileType != "image/jpeg" && $fileType != "image/png") {
        echo "<p id='file-error'>Het bestands type is fout!</p>";
        exit();
    }

    $fileName = $_FILES['file']['name'];
    $fileLocation = $_FILES['file']['tmp_name'];
    $fileTargetLocation = "../img/".time().$fileName;

    move_uploaded_file($fileLocation, $fileTargetLocation);

    //deletes the old image
    unlink($_GET['img_url']);


    $db->updateRecordFormTableBrood();

    header("Location: adminpage.php");
}


if (isset($_POST['delete'])) {
    $id = $_GET["id"];

    unlink("../".$product[0]['img_url']);

    $db->deleteRecordsFromTable("products", "product_id", $id);

    header("location: adminpage.php");
}